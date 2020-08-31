<h1>New order #{{$order->id}}</h1>
User: {{$order->user->name}} <br>
TotalSum: {{$order->total_sum}}

<hr>

<table class="table">
	<thead>
		<tr>
			<th>Img</th>
			<th>Name</th>
			<th>Price</th>
			<th>Qty</th>
			<th>Summ</th>
		</tr>
	</thead>
	<tbody>
		@foreach(session('cart') as $product)
			<tr>
				<td><img src="{{env('APP_URL')}}/{{$product['img']}}" alt="{{$product['name']}}" style="width: 70px"></td>
				<td>{{$product['name']}}</td>
				<td>{{$product['price']}}</td>
				<td>{{$product['qty']}}</td>
				<td>{{$product['price']*$product['qty']}}</td>
			</tr>
		@endforeach
		<tfoot>
           	<tr>
               	<td colspan="3" class="text-right">Total Sum</td>
               	<td colspan="2">{{session('totalSum')}}</td>
           	</tr>
       	</tfoot>
	</tbody>
</table>