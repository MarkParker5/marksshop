@extends('mainlayouts.main')

@section('title')
	{{ $category->name }}
@endsection

@section('content')
	<div class="container">
		<h2 class="text-center">{{ $category->name }}</h2>
		<div class="row">
			@foreach($products as $product)
				@include('shop._product')
			@endforeach
			<div class="mt-5 d-flex justify-content-center">
				{{ $products->links() }}
			</div>
		</div>
	</div>

@endsection