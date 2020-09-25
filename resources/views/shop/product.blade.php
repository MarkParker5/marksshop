@extends('mainlayouts.main')

@section('title')
	{{ $product->name }}
@endsection

@section('content')
	<div class="container">
		<br>
		<div class="row">
			<div class="col-6">
				<img src="{{ $product->img }}" alt="" width="100%">
			</div>
			<div class="col-6">
				<h1>{{ $product->name }}</h1>
				<br>
				<big>{{ $product->price }} грн</big>
				<form action="/" class="mt-5 add-to-cart">
					@csrf
					<input type="number" name="qty" width="20px" value="1" min=1 max=99 class="qty">
					<input type="hidden" name="product_id" value="{{$product->id}}">
					<button class="btn btn-main" style="padding: 5px 30px">В корзину</button>
				</form>
				<br>
			</div>
		</div>
		<div class="description mt-5">
			<h2>Описание</h2>
			<p class="mt-3">{{ $product->description }}</p>
		</div>
		<hr>
		<div class="crossils">
			<h3>С этим товаром часто покупают</h3>
			{{-- @foreach($product->recomended => $product)
				@include('shop._product')
			@endforeach --}}
		</div>
		<hr>
		@guest
		@else
			<div class="mt-5">
				<h5>Добавить отзыв</h5>
				<form action="/product/{{$product->slug}}" method="POST">
					@csrf
					<input type="hidden" name="product_id" value="{{$product->id}}">
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group col-8">
						<textarea name="comment" id="" cols="20" rows="3" class="form-control"></textarea>
						<button class="btn btn-main float-right px-4 mt-1">Отправить</button>
					</div>
				</form>
			</div>
		@endguest
		@if(count($reviews) > 0)
			<div class="mt-5">
				{{--		 REVIEWS		--}}
				<h4 class="text-center">Отзывы</h4>
				<div class="container">
					<div class="reviews">
						@foreach($reviews as $review)
							@include('main._review')
						@endforeach
					</div>
				</div>
			</div>
		@endif
	</div>
@endsection