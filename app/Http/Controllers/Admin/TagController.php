<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::all();
        return view('admin.tag.index', compact('tags') );
    }
    public function create(){
        return view('admin.tag.create');
    }
    public function store(Request $request){
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        
        $tag->save();
        return redirect('/admin/tag')->with('success', 'Tag "' . $tag->name . '" added!');
    }
    public function show($id){
        //
    }
    public function edit($id){
        $tag = Tag::findOrFail($id);
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(Request $request, $id){
        $tag       = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->slug = $request->slug;
        
        $tag->save();
        return redirect('/admin/tag')->with('success', 'Category "' . $tag->name . '" edited!');
    }
    public function destroy($id){
        $tag = Tag::find($id);  
        $tag->products()->detach();
        $tag->delete();
        return back();
    }
}
