@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Слайдер<br>
      <small><a href="/admin/slide/create">Добавить слайд</a></small>
    </h1>
@stop

@section('content')
    {{-- @include('admin._messages') --}}
    <table class="table text-canter">
      <thead>
        <tr>
          <th>ID</th>
          <th>Изображение</th>
          <th>Товар</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($slides as $slide)
          <tr>
            <td width="2%">{{ $loop->iteration }}</td>
            <td><img src="{{ $slide->img }}" alt="{{ $slide->name }}" width="100px"/></td>
            <td><a href="/product/{{$slide->product->slug}}">{{ $slide->product->name }}</a></td>
            <td class="text-right" width="5%">
                <a href="/admin/slide/{{$slide->id}}/edit" class="btn btn-link text-warning">
                  Редактировать
                </a>
                <form action="/admin/slide/{{$slide->id}}" method="POST">
                  @csrf @method('DELETE') 
                  <button class="btn btn-link text-danger">Удалить</i></button>
                </form>    
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
@stop
