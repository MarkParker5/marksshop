@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Add new category</h1> 
@stop
@section('content')
    @include('admin._messages')
   	<form action="/admin/category" method="POST" class="col-6" enctype="multipart/form-data">
        @include('admin.category._form')
        <button class="btn btn-primary">Create</button>
    </form>
@stop
