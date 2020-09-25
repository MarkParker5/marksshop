@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Теги<br>
      <small><a href="/admin/tag/create">Добавить тег</a></small>
    </h1>
@stop

@section('content')
    {{-- @include('admin._messages') --}}
   	<table class="table text-center">
   		<thead>
   			<tr>
   				<th>ID</th>
   				<th>Название</th>
   				<th>Ссылка</th>
   				<th></th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($tags as $tag)
    			<tr>
    				<td width="2%">{{ $loop->iteration }}</td>
    				<td>{{ $tag->name }}</td>
    				<td>{{ $tag->slug }}</td>
    				<td class="text-right" width="5%">
                <a href="/admin/tag/{{$tag->id}}/edit" class="btn btn-link text-warning">
                  Редактировать
                </a>
                <form action="/admin/tag/{{$tag->id}}" method="POST">
                  @csrf @method('DELETE') 
                  <button class="btn btn-link text-danger">Удалить</i></button>
                </form>    
            </td>
    			</tr>
   			@endforeach
   		</tbody>
   	</table>
@stop
