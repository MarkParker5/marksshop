@extends('mainlayouts.main')

@section('title')
	Оформление заказа
@endsection

@section('content')
	<div class="container">

		<h1>Оформление заказа</h1>
		@include('shop._cart')
	

		@if(session('cart'))
			<div class="text-right">
				<a class="btn btn-main" href="/delivery">Оформить заказ</a>
			</div>
			{{-- @guest
				<p> <a href="{{ route('login') }}">{{ __('Login') }}</a> or <a href="{{ route('register') }}">{{ __('Register') }}</a> </p>
			@else
				<div class="text-right">
					<a class="btn btn-main" href="/delivery">Оформить заказ</a>
				</div>
			@endguest --}}
		@else
			<p class="text-center mb-5"><a href="/shop"><big>В магазин</big></a></p>
		@endif

	</div>
@endsection