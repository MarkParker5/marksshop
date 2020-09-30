@extends('mainlayouts.main')

@section('title')
	Оформление заказа
@endsection

@section('content')
  @if(session('cart'))
	<div class="container">

		<h1 class="my-3">Доставка</h1>

		<form class="col-6" name="delivery" id="delivery">
		 <small>* поля обязателные для заполнения</small>
		  {{-- Name Surname --}}
		  <div class="form-row">
		    <div class="form-group col-6">
		      <input type="text" class="form-control" id="name" name="name" placeholder="Имя*">
		    </div>
		    <div class="form-group col-6">
		      <input type="text" class="form-control" id="surname" name="surname" placeholder="Фамилия*">
		    </div>
		  </div>
		  {{-- Phone Email--}}
		  <div class="form-row">
		    <div class="form-group col-6">
		      <input type="tel" class="form-control" id="tel" name="tel" placeholder="Телефон*">
		    </div>
		    <div class="form-group col-6">
		      <input type="email" class="form-control" id="mail" name="mail" placeholder="Email">
		    </div>
		  </div>
		  {{-- City --}}
		  <div class="form-group">
			<input type="text" list="city" name="city" class="form-control" placeholder="Город*" />
			<datalist id="city">
				<option></option>
				@foreach($cities as $city)
					<option data-value="{{$city['Ref']}}" value="{{$city['DescriptionRu']}}"></option>
				@endforeach
			</datalist>
			<input type="hidden" name="city_id" id="cidy_id">
		  </div>
		  {{-- NovaPoshta --}}
		  <div class="form-group">
			<input type="text" list="post" name="post" class="form-control" placeholder="Отделение новой почты, №*" />
			<datalist id="post">
			</datalist>
		  </div>
		  {{-- Comment --}}
		  <div class="form-group">
		  	 <textarea class="form-control" id="comment" rows="3" placeholder="Примечания к заказу"></textarea>
		  </div>
	 	  {{-- Payment --}}
		  <div class="form-group text-right">
			  <button name="next" class="btn btn-main">Продолжить</button><br>
			  <small>
			    *Нажимая продолжить вы соглашаетесь с <a href="">правилами сайта</a>
			  </small>
		  </div>
		</form>
		<div id="liqpay" style="display: none; visibility: hidden"></div>
	</div>
  @else
    <p class="mt-5 text-center"><big>Ваша корзина пуста</big></p>
	<p class="text-center mb-5"><a href="/shop"><big>В магазин</big></a></p>
  @endif
@endsection