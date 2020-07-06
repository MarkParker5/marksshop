@extends('mainlayouts.main')

@section('title')
	{{ $category->name }} • Marks Shop
@endsection

@section('content')
	<div class="container">
		<h2 class="text-center">{{ $category->name }}</h2>
		<div class="row">
			@foreach($products as $product)
				<div class="col-3 text-center mt-3">
					@include('shop._product')
				</div>	
			@endforeach
			<div class="mt-5 d-flex justify-content-center">
				{{ $products->links() }}
			</div>
		</div>
	</div>

@endsection