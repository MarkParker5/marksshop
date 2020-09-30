@if( session('cart') )

	<table class="table">
		<thead>
			<tr>
				<th>Изображение</th>
				<th>Название</th>
				<th>Цена</th>
				<th>Количество</th>
				<th>Всего</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach(session('cart') as $product)
				<tr>
					<td><img src="{{$product['img']}}" alt="" style="width: 70px"></td>
					<td>{{$product['name']}}</td>
					<td>{{$product['price']}} грн</td>
					<td>{{$product['qty']}}</td>
					<td>{{$product['price']*$product['qty']}} грн</td>
					<td>
						<form class="product-delete">
							@csrf
							<input type="hidden" value="{{$product['id']}}" name="product_id">
							<button class="btn btn-link text-danger">Удалить</button>
						</form>
					</td>
				</tr>
			@endforeach
			<tfoot>
            	<tr>
                	<td colspan="5" class="text-right"><big>Итог</big></td>
                	<td><big>{{session('totalSum')}} грн</big></td>
            	</tr>
        	</tfoot>
		</tbody>
	</table>

@else

	<p class="text-center my-5"><big>Корзина пуста</big></p>

@endif