@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Edit category "{{$category->name}}"</h1> 
@stop

@section('content')
    @include('admin._messages')
   	<form action="/admin/category/{{$category->id}}" method="POST" class="col-6" enctype="multipart/form-data">
   		@method('PUT')
        @include('admin.category._form')
        <button class="btn btn-primary">Update</button>
    </form>
@stop
