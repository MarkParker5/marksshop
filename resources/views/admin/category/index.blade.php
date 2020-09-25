@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Категории <br>
      <small><a href="/admin/category/create">Добавить категорию</a></small>
    </h1>
@stop

@section('content')
   {{--  @include('admin._messages') --}}
   	<table class="table text-center">
   		<thead>
   			<tr>
   				<th>ID</th>
   				<th>Изображение</th>
   				<th>Название</th>
   				<th>Ссылка</th>
   				<th></th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($categories as $category)
    			<tr>
    				<td width="2%">{{ $loop->iteration }}</td>
    				<td><img src="{{ $category->img }}" alt="{{ $category->name }}" width="50px"/></td>
    				<td>{{ $category->name }}</td>
    				<td><a href="/category/{{ $category->slug }}">{{ $category->slug }}</a></td>
    				<td class="text-right" width="5%">
                <a href="/admin/category/{{$category->id}}/edit" class="btn btn-link text-warning">
                  Редактировать
                </a>
                <form action="/admin/category/{{$category->id}}" method="POST">
                  @csrf @method('DELETE') 
                  <button class="btn btn-link text-danger">Удалить</i></button>
                </form>    
            </td>
    			</tr>
   			@endforeach
   		</tbody>
   	</table>
@stop
