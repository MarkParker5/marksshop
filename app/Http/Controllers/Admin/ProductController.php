<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Tag;
use App\TagsProduct;
use App\Image;
use App\Http\Requests\StoreProduct;

class ProductController extends Controller{
    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products') );
    }
    public function create(){
        $categories = Category::all();
        $products   = Product::all();
        $tags       = Tag::all();
        return view('admin.product.create', compact('categories', 'products', 'tags') );
    }
    public function store(StoreProduct $request){
        // $validatedData = $request->validate([
        //     'name' => 'required|unique:categories|max:64',
        //     'slug' => 'required|unique:categories|max:128',
        //     'img'  => 'nullable|mimes:jpeg,png,bmp,gih',
        // ]);

        $product              = new Product();
        $product->name        = $request->name;
        $product->slug        = $request->slug;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->price       = $request->price;
        $product->recomended  = $request->recomended ?? 0;
        $product->upsell      = $request->upsell;
        $product->cross_sell  = $request->cross_sell;

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $product->img = '/uploads/'.$fName;
        }
        $product->save();

        $files = $request->file('images');
        if($files){
            $imgs = $product->images->count();
            foreach($files as $file){
                if($imgs++ >= 9){break;}
                if(in_array($file, $product->images->pluck('img')->toArray() )){continue;}
                $fName = 'products/'.$product->slug.'/'.$file->getClientOriginalName();
                $file->move( public_path('uploads'), $fName );
                $image = new Image();
                $image->img = '/uploads/'.$fName;
                $image->product_id = $product->id;
                $image->save();
            } 
        }
        
        $product->save();
        $product->tags()->sync($request->tags);
        return redirect('/admin/product')->with('success', 'Product ' . $product->name . ' added!');
    }
    public function show($id)
    {
        //
    }
    public function edit($id){
        $product    = Product::findOrFail($id);
        $products   = Product::all();
        $categories = Category::all();
        $tags       = Tag::all();
        return view('admin.product.edit', compact('product', 'categories', 'tags', 'products'));
    }
    public function update(Request $request, $id){
        $product              = Product::findOrFail($id);
        $product->name        = $request->name;
        $product->slug        = $request->slug;
        $product->description = $request->description;
        $product->category_id = $request->category;
        $product->price       = $request->price;
        $product->recomended  = $request->recomended ?? 0;

        $product->upsell      = $request->upsell;
        $product->cross_sell  = $request->cross_sell;

        $file = $request->file('img');
        if($file){
            $fName = time().$file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $product->img = '/uploads/'.$fName;
        }

        $files = $request->file('images');
        if($files){
            $imgs = $product->images->count();
            foreach($files as $file){
                if($imgs++ >= 9){break;}
                $fName = $product->slug.'-'.$file->getClientOriginalName();
                $file->move( public_path('uploads'), $fName );
                $image = new Image();
                $image->img = '/uploads/'.$fName;
                $image->product_id = $product->id;
                $image->save();
            } 
        }

        $product->save();
        $product->tags()->sync($request->tags);
        return redirect('/admin/product')->with('success', 'Product "' . $product->name . '" edited!');
    }
    public function destroy($id){
        $product = Product::find($id);
        $product->tags()->detach();
        $product->delete();
        return back();
    }
}
