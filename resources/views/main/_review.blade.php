<div class="review">
	<div class="photo">
		<img src="{{ $review->user->img ?? '' }}" alt="">
	</div>
	<div class="text">
		<h5>
			{{ $review->user->name }}
			<small>(Product: <a href="/product/{{ $review->product->slug }}">{{ $review->product->name }}</a>)</small>
		</h5>
		<p>{{ $review->review }}</p>
		<small>{{ $review->updated_at }} </small>
	</div>
</div>