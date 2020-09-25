@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Добавить тег</h1> 
@stop
@section('content')
    {{-- @include('admin._messages') --}}
   	<form action="/admin/tag" method="POST" class="col-6" enctype="multipart/form-data">
        @include('admin.tag._form')
        <button class="btn btn-primary">Создать</button>
    </form>
@stop
