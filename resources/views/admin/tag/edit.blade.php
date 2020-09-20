@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Edit tag "{{$tag->name}}"</h1> 
@stop

@section('content')
    @include('admin._messages')
   	<form action="/admin/tag/{{$tag->id}}" method="POST" class="col-6" enctype="multipart/form-data">
   		@method('PUT')
        @include('admin.tag._form')
        <button class="btn btn-primary">Update</button>
    </form>
@stop
