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

    	$categories = Category::all();
    	$products = Product::where('recomended', 1)->get();
        $reviews = Review::orderBy('updated_at')->take(5)->get();
    	return view('main.index', compact('categories', 'products', 'reviews') );
    }
    public function category(string $slug){
    	$category = Category::firstWhere('slug', $slug);
    	$products = Product::where('category_id', $category->id)->paginate(8);//get();
    	return view('shop.category', compact('category', 'products') );
    }
    public function product(string $slug){
        $product = Product::firstWhere('slug', $slug);
        $reviews = Review::where('product_id', $product->id)->get();
        return view('shop.product', compact('product', 'reviews') );
    }
}

