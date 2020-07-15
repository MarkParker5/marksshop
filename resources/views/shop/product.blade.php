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
		<hr>
		@guest
		@else
			<div>
				<h3>Add Review</h3>
				<form action="/product/{{$product->slug}}" method="POST">
					@csrf
					<input type="hidden" name="product_id" value="{{$product->id}}">
					<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
					<div class="form-group col-8">
						<textarea name="comment" id="" cols="30" rows="10" class="form-control"></textarea>
						<button class="btn btn-primary float-right px-4">Send</button>
					</div>
				</form>
			</div>
		@endguest
		{{--		 REVIEWS		--}}
		<h2 class="text-center">Reviews</h2>
		<div class="container">
			<div class="reviews">
				@foreach($reviews as $review)
					@include('main._review')
				@endforeach
			</div>
		</div>
	</div>

@endsection