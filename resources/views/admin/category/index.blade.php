@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
   	<table class="table">
   		<thead>
   			<tr>
   				<th>ID</th>
   				<th>Image</th>
   				<th>Name</th>
   				<th>Slug</th>
   				<th>Options</th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($categories as $category)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				<td><img src="{{ $category->img }}" alt="{{ $category->name }}" width="50px"/></td>
    				<td>{{ $category->name }}</td>
    				<td>{{ $category->slug }}</td>
    				<td></td>
    			</tr>
   			@endforeach
   		</tbody>
   	</table>
@stop