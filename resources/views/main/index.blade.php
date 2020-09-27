@extends('mainlayouts.main')

@section('title')
	Главная
@endsection

@section('content')

@include('admin._messages')

{{--		 SLIDER			--}}
<div class="sliders homepage">
	<div class="arrow"></div>
	<div class="arrow"></div>
	<div class="window">
		<div class="thumbs">
			@foreach($slides as $slide)
				<a href="{{ $slide->slug }}">
					<img class="slider-img" src="{{ $slide->img }}"/>
				</a>
			@endforeach
		</div>
	</div>
	<div class="points">
		@for($i = 0; $i < count($slides); $i++)
			<div{{ $i ? '' : ' class=active'}}></div>
		@endfor
	</div>
</div>



{{--		 CATEGORY TILES			--}}
<h2 class="table-name">Категории</h2>
<table class="categories">
	<tbody>
		<tr class="tiles-tr">
			@for($i = 0; $i < 2 && isset($categories[$i]); $i++)
				<td class="tiles-td-sq">
					<div class="tile" style="background-image: url({{ $categories[$i]->img }});">
						<a href="/category/{{ $categories[$i]->slug }}">
							<div class="tile-text">
								<h2>{{ $categories[$i]->name }}</h2>
							</div>
						</a>
					</div>
				</td>
			@endfor
		</tr>
	</tbody>
</table>

@if(count($products) > 2)
{{-- 		RECOMENDED PRODUCT TILES 		--}}
<h2 class="table-name">Рекомендованные</h2>
<table class="second-table">
	<tbody>
		<tr class="tiles-tr">
			<td class="tiles-td" rowspan="2">
				<div class="tile" style="background-image: url({{ $products[0]->img }});">
					<a href="/product/{{ $products[0]->slug }}">
						<div class="tile-text">
							<h2>{{ $products[0]->slug }}</h2>
						</div>
					</a>
				</div>
			</td>
			<td class="tiles-td">
				<div class="tile" style="background-image: url({{ $products[1]->img }});">
					<a href="/product/{{ $products[1]->slug }}">
						<div class="tile-text">
							<h2>{{ $products[1]->slug }}</h2>
						</div>
					</a>
				</div>
			</td>
		</tr>
		<tr class="tiles-tr">
			<td class="tiles-td">
				<div class="tile" style="background-image: url({{ $products[2]->img }});">
					<a href="/product/{{ $products[2]->slug }}">
						<div class="tile-text">
							<h2>{{ $products[2]->slug }}</h2>
						</div>
					</a>
				</div>
			</td>
		</tr>
	</tbody>
</table>
@endif


{{--		 REVIEWS		--}}
@if($reviews->count())
	<h2 class="text-center">Отзывы</h2>
	<div class="container">
		<div class="reviews">
			@foreach($reviews as $review)
				@include('main._review')
			@endforeach
		</div>
	</div>
@endif

@endsection
