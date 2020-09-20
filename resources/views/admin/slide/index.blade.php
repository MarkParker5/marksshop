@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Slides <br>
      <small><a href="/admin/slide/create">Add new slide</a></small>
    </h1>
@stop

@section('content')
    @include('admin._messages')
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Image</th>
          <th>Product</th>
          <th>Options</th>
        </tr>
      </thead>
      <tbody>
        @foreach($slides as $slide)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td><img src="{{ $slide->img }}" alt="{{ $slide->name }}" width="100px"/></td>
            <td><a href="/product/{{$slide->product->slug}}">{{ $slide->product->name }}</a></td>
            <td>
                <a href="/admin/slide/{{$slide->id}}/edit" class="btn btn-warning">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="/admin/slide/{{$slide->id}}" method="POST">
                  @csrf @method('DELETE') 
                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>    
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@stop
