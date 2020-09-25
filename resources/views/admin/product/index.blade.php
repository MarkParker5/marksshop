@extends('adminlte::page')

@section('title', 'Products')

@section('content_header')
    <h1>Товары <br>
        <small><a href="/admin/product/create/">Добавить товар</a></small>
    </h1>
@stop

@section('content')
    {{-- @include('admin._messages') --}}
   	<table class="table text-center">
   		<thead>
   			<tr>
   				<th>ID</th>
   				<th>Изображение</th>
          <th>Категория</th>
   				<th>Название</th>
          <th>Ссылка</th>
          <th>Цена</th>
          <th>Теги</th>
   				<th>Рекомендованный</th>
   				<th></th>
   			</tr>
   		</thead>
   		<tbody>
   			@foreach($products as $product)
          <tr>
    				<td width="2%">{{ $loop->iteration }}</td>
    				<td><img src="{{ $product->img }}" alt="{{ $product->name }}" width="50px"/></td>
            <td>{{ $product->category->name ?? '' }}</td> 
    				<td>{{ $product->name }}</td> 
            <td>{{ $product->slug }}</td>
            <td>{{ $product->price}}</td>
            <td>{{ implode(', ', $product->tags()->pluck('name')->toArray()) }}</td>
    				<td>{{ $product->recomended ? '+' : ''}}</td>
    				<td class="text-right" width="5%">
                <a href="/admin/product/{{$product->id}}/edit" class="btn btn-link text-warning">
                  Редактировать
                </a>
                <form action="/admin/product/{{$product->id}}" method="POST">
                  @csrf @method('DELETE') 
                  <button class="btn btn-link text-danger">Удалить</i></button>
                </form>    
            </td>
    			</tr>
   			@endforeach
   		</tbody>
   	</table>
@stop
