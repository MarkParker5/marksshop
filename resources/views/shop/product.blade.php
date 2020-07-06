@extends('mainlayouts.main')

@section('title')
	{{ $product->name }} • Marks Shop
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-6">
				<img src="{{ $product->img }}" alt="" width="100%">
			</div>
			<div class="col-6">
				<h3>{{ $product->name }}</h3>
				<h4>{{ $product->category->name ? "Category: {$product->category->name} " : ''  }}</h4>
				<br>
				<big>{{ $product->price }}$</big>
				<form action="" class="mt-5"><button class="btn btn-primary" style="padding: 5px 30px">Buy</button></form>
				<p class="mt-5">{{ $product->description }}</p>
				<br>
			</div>
		</div>
		<div>
			@foreach($reviews as $review)
				<div class="my-2 border mt-5">
					{{ $review->review }} <hr>
					<strong> -{{ $review->user->name }} </strong>
					{{ $review->updated_at }} 
				</div>
			@endforeach()
		</div>
	</div>

@endsection