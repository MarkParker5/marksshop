@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Добавить слайд</h1> 
@stop
@section('content')
    {{-- @include('admin._messages') --}}
   	<form action="/admin/slide" method="POST" class="col-6" enctype="multipart/form-data">
        @include('admin.slide._form')
        <button class="btn btn-primary">Создать</button>
    </form>
@stop
