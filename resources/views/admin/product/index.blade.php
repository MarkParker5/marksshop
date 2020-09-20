@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Products <br>
        <small><a href="/admin/product/create/">Create new product</a></small>
    </h1>
@stop

@section('content')
    @include('admin._messages')
   	<table class="table text-center">
   		<thead>
   			<tr>
   				<th>ID</th>
   				<th>Image</th>
          <th>Category</th>
   				<th>Name</th>
          <th>Slug</th>
          <th>Price</th>
          <th>Tags</th>
   				<th>Recomended</th>
   				<th>Options</th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($products as $product)
          <tr>
    				<td>{{ $loop->iteration }}</td>
    				<td><img src="{{ $product->img }}" alt="{{ $product->name }}" width="50px"/></td>
            <td>{{ $product->category->name ?? '' }}</td> 
    				<td>{{ $product->name }}</td> 
            <td>{{ $product->slug }}</td>
            <td>{{ $product->price}}</td>
            <td>{{ implode(', ', $product->tags()->pluck('name')->toArray()) }}</td>
    				<td>{{ $product->recomended ? '+' : ''}}</td>
    				<td>
                <a href="/admin/product/{{$product->id}}/edit" class="btn btn-warning">
                  <i class="fa fa-edit"></i>
                </a>
                <form action="/admin/product/{{$product->id}}" method="POST">
                  @csrf @method('DELETE') 
                  <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                </form>    
            </td>
    			</tr>
   			@endforeach
   		</tbody>
   	</table>
@stop
