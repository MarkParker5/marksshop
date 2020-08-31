const formAddToCart = document.querySelector('.add-to-cart');
if(formAddToCart){
	formAddToCart.addEventListener('submit', (e) => {
		e.preventDefault();
		const data = new FormData(formAddToCart);
		axios.post('/cart/add', data)
			.then(function(responce){
				updateCart(responce.data);
			});
	});
};

function updateCart(data){
	document.querySelector("[data-target=\"#exampleModal\"]").click()
	document.querySelector('.modal-body').innerHTML = data;
}

document.querySelector('.clear-cart').addEventListener('click', function(e){
	e.preventDefault();

	axios.post('/cart/clear')
		.then( function(responce){
			updateCart(responce.data);
		})
})


document.body.addEventListener('submit', function(e){
	if(e.target.classList.contains('product-delete')){
		e.preventDefault();
		const data = new FormData(e.target);

		axios.post('/cart/delete', data)
			.then(function(responce){
				updateCart(responce.data);
			});
	}
})