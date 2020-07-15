<div class="border">
	<a href="/product/{{ $product->slug }}">
		@if($product->recomended) <div class="recomended" style="color:white; position: absolute; top:0; right:20px; font-size: 1.2em; background-color: #0005; font-weight: bolder;">Recomended</div> @endif
		<img src="{{ $product->img }}" alt="" class="img-fluid">
		<p>{{ $product->name }} ({{ $product->reviews->count() }} reviews)</p>
		<p>{{ $product->price }}</p>
	</a>
</div>

