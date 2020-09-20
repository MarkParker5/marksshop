<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;

class SliderController extends Controller{
    public function index(){
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides') );
    }
    public function create(){
        $products = Product::all();
        return view('admin.slide.create', compact('products'));
    }
    public function store(Request $request){
        $slide = new Slide();
        $slide->product_id = $request->product_id;

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $slide->img = '/uploads/'.$fName;
        }
        
        $slide->save();
        return redirect('/admin/slide')->with('success', 'Slide "' . $slide->product->name  . '" added!');
    }
    public function show($id){
        //
    }
    public function edit($id){
        $slide = Slide::findOrFail($id);
        $products = Product::all();
        return view('admin.slide.edit', compact('slide', 'products'));
    }
    public function update(Request $request, $id){
        $slide       = Slide::findOrFail($id);
        $slide->product_id = $request->product_id;

        $file = $request->file('img');
        if($file){
            $fName = $file->getClientOriginalName();
            $file->move( public_path('uploads'), $fName );
            $slide->img = '/uploads/'.$fName;
        }
        
        $slide->save();
        return redirect('/admin/slide')->with('success', 'Slide "' . $slide->product->name . '" edited!');
    }
    public function destroy($id){
        $slide = Slide::find($id);
        $slide->delete();
        return back();
    }
}
