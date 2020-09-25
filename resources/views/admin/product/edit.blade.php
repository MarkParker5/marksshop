@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Изменить товар "{{$product->name}}"</h1> 
@stop

@section('content')
    {{-- @include('admin._messages') --}}
   	<form action="/admin/product/{{$product->id}}" method="POST" class="col-6" enctype="multipart/form-data">
   		@method('PUT')
        @include('admin.product._form')
        <button class="btn btn-primary">Обновить</button>
    </form>
@stop
