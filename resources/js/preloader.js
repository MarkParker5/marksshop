document.body.onload = function(){
	setTimeout(() => {
		let preloader = document.getElementById('preloader');
		if( !preloader.classList.contains('done') ){ 
			preloader.classList.add('done');
		};
	}, 400);
}

addEventListener('beforeunload', () => {
	let preloader = document.getElementById('preloader');
	if( preloader.classList.contains('done') ){ 
		preloader.classList.remove('done');
	};
})