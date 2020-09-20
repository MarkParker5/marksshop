@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
    <h1>Tags <br>
      <small><a href="/admin/tag/create">Add new tags</a></small>
    </h1>
@stop

@section('content')
    @include('admin._messages')
   	<table class="table">
   		<thead>
   			<tr>
   				<th>ID</th>
   				<th>Name</th>
   				<th>Slug</th>
   				<th>Options</th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($tags as $tags)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				<td>{{ $tags->name }}</td>
    				<td>{{ $tags->slug }}</td>
    				<td>
                <a href="/admin/tag/{{$tags->id}}/edit" class="btn btn-warning">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="/admin/tag/{{$tags->id}}" method="POST">
                  @csrf @method('DELETE') 
                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>    
            </td>
    			</tr>
   			@endforeach
   		</tbody>
   	</table>
@stop
