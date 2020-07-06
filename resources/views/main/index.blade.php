@extends('mainlayouts.main')



@section('title')
	Test
@endsection

@section('content')

	{{-- <h1>{{ $title }} {!! $subtitle !!}</h1>


	@php
		echo time();
	@endphp
	 
	<hr>

	@foreach($users as $u)
		{{ $loop->iteration }}.{{ $u }} <br>
	@endforeach

	<hr>

	<pre>
		@json($users, JSON_PRETTY_PRINT)
	</pre> --}}


	<div class="container">
		<h2 class="text-center">Categories</h2>
		<div class="row">
			@foreach($categories as $category)
				<div class="col-3 text-center mt-3">
					<div class="border">
						<a href="/category/{{ $category->slug }}">
							<img src="{{ $category->img }}" alt="" class="img-fluid">
							<p>{{ $category->name }} ({{ $category->products->count() }}) </p>
						</a>
					</div>
				</div>	
			@endforeach
		</div>
	</div>

	<br>

	<div class="container">
		<h2 class="text-center">Products</h2>
		<div class="row">
			@foreach($products as $product)
				<div class="col-3 text-center mt-3">
					@include('shop._product')
				</div>	
			@endforeach
		</div>
	</div>

	<hr>

	<div class="container">
		@foreach($reviews as $review)
			<div class="my-2 border mt-5">
				<h5>{{ $review->product->name }}</h5>
				{{ $review->review }} <hr>
				<strong>-{{ $review->user->name }} </strong>
				{{ $review->updated_at }} 
			</div>
		@endforeach()
	</div>

@endsection
