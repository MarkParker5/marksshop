@extends('mainlayouts.main')

@section('title')
	Shop
@endsection

@section('content')


<div class="container">
	<h1 class="text-center">Categories</h1>
	<div class="row">
		@foreach($categories as $category)
			<div class="col-3 text-center mt-3">
				<div class="border">
					<a href="/category/{{ $category->slug }}">
						<img src="{{ $category->img }}" alt="" class="img-fluid">
						<p>{{ $category->name }} ({{ $category->products->count() }} products) </p>
					</a>
				</div>
			</div>	
		@endforeach
	</div>
</div>

<br> <hr>

<div class="container">
	<h2 class="text-center">Recomended products</h2>
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
	<h2 class="text-center">Last reviews</h2>
	@foreach($reviews as $review)
		@include('main._review')
	@endforeach()
</div>



@endsection