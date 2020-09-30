let form = document.forms.delivery

if(form){
	let options = document.querySelectorAll('form#delivery #city>*')
	document.querySelector('form#delivery input[name="city"]').addEventListener('change', (e) => {
		for (opt of options){
			if (opt.value == e.target.value) {
				form['city_id'].value = opt.getAttribute('data-value')
				break
			}
		}
		document.querySelector('form#delivery input[name="post"]').disabled = true
		document.querySelector('form#delivery input[name="post"]').placeholder = "Загрузка отделений..."
		const data = new FormData(form);
		axios.post('/get-warehouses', data)
			.then(function(responce){
				updateWarehouses(responce.data);
			});
	})

	let next = form.next
	let liqpay = document.querySelector('#liqpay')

	next.addEventListener('click', (e) => {
		e.preventDefault();
		const data = new FormData(form)
		axios.post('/end-checkout', data)
			.then(function(responce){
				liqpay.innerHTML = responce.data
				document.querySelector('#liqpay>*').submit()
			});
	})
}

function updateWarehouses(html){
	document.querySelector('form#delivery #post').innerHTML = html
	document.querySelector('form#delivery input[name="post"]').placeholder = "Отделение новой почты, №*"
	document.querySelector('form#delivery input[name="post"]').disabled = false
}