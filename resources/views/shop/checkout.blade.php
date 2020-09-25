@extends('layouts.app')

@section('title')
	Оформление заказа
@endsection

@section('content')
	<div class="container">

		<h1>Checkout</h1>
		@include('shop._cart')
	

		@guest
			<p> <a href="{{ route('login') }}">{{ __('Login') }}</a> or <a href="{{ route('register') }}">{{ __('Register') }}</a> </p>
		@else
			<div class="text-right">
				<a class="btn btn-primary" href="/end-checkout">Next</a>
			</div>
		@endguest

	</div>
@endsection