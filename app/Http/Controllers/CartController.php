<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use App\OrderItems;
use Mail;
use Illuminate\Http\Request;
use \LisDev\Delivery\NovaPoshtaApi2;
use \LiqPay;
use Session;

class CartController extends Controller{
    public function add(Request $request){
    	$product = Product::find($request->product_id);

    	$cart = new CartService();
    	$cart->add($product, $request->qty);

    	return view('shop._cart');
    }
    public function clear(){
    	CartService::clear();
    }

    public function delete(Request $request){
    	CartService::delete($request->product_id);
    	return view('shop._cart');
    }

    public function checkout(){
    	return view('shop.checkout');
    }

    public function delivery(Request $request){
        $key = env('NOVA_POSHTA_KEY');
        $np = new NovaPoshtaApi2($key, 'ru', FALSE, 'curl');
        $cities = $np->getCities()['data'];
        Session::put('order_id', null);

        return view('shop.delivery', compact('cities'));
    }

    public function getWarehouses(Request $request){
        $key = env('NOVA_POSHTA_KEY');
        $np = new NovaPoshtaApi2($key, 'ru', FALSE, 'curl');
        $whs = $np->getWarehouses($request->city_id);
        $html = '';

        foreach ($whs['data'] as $wh){
            $html .= '<option data-value="'.$wh['Ref'].'">'.$wh['DescriptionRu'].'</option>';
        }

        return $html;
    }

    public function endCheckout(Request $request){
    	$order 				= new Order();
    	$order->user_id 	= \Auth::user()->id ?? null;
    	$order->total_sum 	= session('totalSum') ?? 0;
        $order->status      = 'waiting';
        $order->name        = $request->name;
        $order->surname     = $request->surname;
        $order->tel         = $request->tel;
        $order->mail        = $request->mail;
        $order->city        = $request->city;
        $order->post        = $request->post;
        $order->comment     = $request->comment;
        $order->save();

    	foreach (session('cart') as $product) {
    		$item 			= new OrderItems();
    		$item->name 	= $product['name'];
    		$item->img 		= $product['img'];
    		$item->price 	= $product['price'];
    		$item->qty 		= $product['qty'];
    		$item->order_id	= $order->id;
    		$item->save();
    	}

        $public_key  = env('LIQ_PAY_PUBLIC_KEY');
        $private_key = env('LIQ_PAY_PRIVATE_KEY');
        $amount      = session('totalSum');

        $liqpay = new LiqPay($public_key, $private_key);
        $html = $liqpay->cnb_form(array(
            'action'         => 'pay',
            'amount'         => $amount,
            'currency'       => 'UAH',
            'description'    => 'Заказ №'.$order->id,
            'order_id'       => $order->id,
            'version'        => '3',
            'result_url'     => url('/success-payment'),
        ));

        CartService::clear($order->id);

        return $html;
    }

    public function successPayment(Request $request){
        $public_key  = env('LIQ_PAY_PUBLIC_KEY');
        $private_key = env('LIQ_PAY_PRIVATE_KEY');

        $liqpay = new LiqPay($public_key, $private_key);
        $res = $liqpay->api("request", array(
            'action'        => 'status',
            'version'       => '3',
            'order_id'      => session('orderId'),
        ));

        if(!$res){ 
            return redirect('/');
        }
        if($res->status != 'success'){ 
            return redirect('/')->with('danger', 'Ошибка'); 
        }

        $order = Order::find(session('orderId'));

        if(!$order){ 
            return redirect('/');
        }

        if($order->status == 'ok') {
            return redirect('/')->with('success', 'Оплата прошла успешно'); 
        }else if($order->status == 'waiting'){ 
            $order->status = 'delivery';
            //  create novaposhta track
            //  $order->track = ↑
            if($order->mail){
                Mail::send('email.order', compact('order'), function($m) use ($order){
                    $m->to($order->mail);
                    return $m;
                });
            }
            Mail::send('email.notify', compact('order'), function($m){
                $m->to(env('NOTIFY_MAIL'));
                return $m;
            });
            $order->save();
            return redirect('/')->with('success', 'Оплата прошла успешно');
        }

        return redirect('/');
    }
}
