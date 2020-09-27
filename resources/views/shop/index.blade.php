@extends('mainlayouts.main')

@section('title')
	Магазин 
@endsection

@section('content')


<div class="container">
	<h1 class="text-center">Категории</h1>
	<div class="row justify-content-center">
		@foreach($categories as $category)
			@if($category->products->count())
				@include('shop._category')
			@endif
		@endforeach
	</div>
</div>

<br> 

@if($products->count())
	<hr>
	<div class="container">
		<h2 class="text-center">Рекомендованные</h2>
		<div class="row">
			@foreach($products as $product)
				<div class="col-3 text-center mt-3">
					@include('shop._product')
				</div>	
			@endforeach
		</div>
	</div>
@endif

@if($reviews->count())
	<hr>
	<div class="container">
		<h2 class="text-center">Последние отзывы</h2>
		@foreach($reviews as $review)
			@include('main._review')
		@endforeach()
	</div>
@endif


@endsection