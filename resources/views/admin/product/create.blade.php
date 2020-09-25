@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Добавить товар</h1> 
@stop
@section('content')
    {{-- @include('admin._messages') --}}
   	<form action="/admin/product" method="POST" class="col-6" enctype="multipart/form-data">
        @include('admin.product._form')
        <button class="btn btn-primary">Создать</button>
    </form>
    <br>
@stop
