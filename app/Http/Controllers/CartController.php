<?php

namespace App\Http\Controllers;

use App\Http\Services\CartService;
use App\Http\Controllers\Controller;
use App\Product;
use App\Order;
use App\OrderItems;
use Mail;
use Illuminate\Http\Request;

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

    public function endCheckout(){
    	//	save to db
    	$order 				= new Order();
    	$order->user_id 	= \Auth::user()->id;
    	$order->total_sum 	= session('totalSum');
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

    	Mail::send('email.order', compact('order'), function($m){
    		$m->to('markitstep@gmail.com');
    		return $m;
    	});

    	return redirect('/')->with('success', 'Thanks!');
    }
}
