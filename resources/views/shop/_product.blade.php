<div class="text-center col-3 product-card p-2">
	<a href="/product/{{ $product->slug }}"> 
		<div class="image" style="background-image: url({{$product->img}})"></div>
		<div class="info">
			<div class="text">
				<h4>{{ $product->name }}</h4>
				<big>{{ $product->price }}</big>
			</div>
		</div>
	</a>
</div>

