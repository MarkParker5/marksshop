@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Изменить слайд</h1> 
@stop

@section('content')
    {{-- @include('admin._messages') --}}
   	<form action="/admin/slide/{{$slide->id}}" method="POST" class="col-6" enctype="multipart/form-data">
   		@method('PUT')
        @include('admin.slide._form')
        <button class="btn btn-primary">Обновить</button>
    </form>
@stop
