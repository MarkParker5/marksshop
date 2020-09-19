<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Review;

class MainController extends Controller{
    public function index(){
        /*$category = Category::find(1);
        $products = $category->products;
        dd($products);*/

        /*$product = Product::find(1);
        dd($product->category->name);*/
        

        // $categories = Category::all();
    	$categories = Category::with('products')->get();
        //$products   = Product::where('recomended', 1)->get();
    	$products   = Product::with('category')->where('recomended', 1)->get();

        $reviews    = Review::orderBy('updated_at', 'desc')->take(5)->get();

        // need to add slider to the database
        $slides     = [];
        $slides[]   = new class{
            public $img  = "http://loremflickr.com/1920/900/"; 
            public $name = "Lorem"; 
            public $slug = "slider-link"; 
        };
        $slides[]   = new class{
            public $img  = "http://loremflickr.com/1920/900/"; 
            public $name = "Lorem"; 
            public $slug = "slider-link"; 
        };
        $slides[]   = new class{
            public $img  = "http://loremflickr.com/1920/900/"; 
            public $name = "Lorem"; 
            public $slug = "slider-link"; 
        };

        // $slides[]   = new class{
        //     public $img        = "http://loremflickr.com/1920/900/"; 
        //     public $name       = "Lorem"; 
        //     public $product_id = 8; 
        // };
        // end of slides data

    	return view('main.index', compact('categories', 'products', 'reviews', 'slides') );
    }
    public function shop(){
        // $categories = Category::all();
        $categories = Category::with('products')->get();
        $products   = Product::with('category')->where('recomended', 1)->get();
        $reviews    = Review::orderBy('updated_at', 'desc')->take(5)->get();
        return view('shop.index', compact('categories', 'products', 'reviews') );
    }
    public function category(string $slug){
    	$category = Category::firstWhere('slug', $slug);
    	$products = Product::where('category_id', $category->id)->paginate(8);//get();
    	return view('shop.category', compact('category', 'products') );
    }
    public function product(string $slug){
        $product = Product::firstWhere('slug', $slug);
        $reviews = Review::where('product_id', $product->id)->orderBy('updated_at', 'desc')->get(); 
        return view('shop.product', compact('product', 'reviews') );
    }
    public function getReview(Request $request){
        $review = new Review();
        $review->review     = $request->comment;
        $review->user_id    = $request->user_id;        // XD
        $review->product_id = $request->product_id;
        $review->save();
        return back();
        //header('Location: ' . $_SERVER['referer']); die();
    }
}

