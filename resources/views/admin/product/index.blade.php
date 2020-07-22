@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Products <br>
        <small><a href="/admin/product/create/">Create new product</a></small>
    </h1>
@stop

@section('content')
    @include('admin._messages')
   	<table class="table">
   		<thead>
   			<tr>
   				<th>ID</th>
   				<th>Image</th>
          <th>Category</th>
   				<th>Name</th>
   				<th>Slug</th>
   				<th>Options</th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($products as $product)
    			<tr>
    				<td>{{ $loop->iteration }}</td>
    				<td><img src="{{ $product->img }}" alt="{{ $product->name }}" width="50px"/></td>
            <td>{{ $product->category->name }}</td>
    				<td>{{ $product->name }}</td>
    				<td>{{ $product->slug }}</td>
    				<td></td>
    			</tr>
   			@endforeach
   		</tbody>
   	</table>
@stop
