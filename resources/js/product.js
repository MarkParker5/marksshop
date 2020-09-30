let big = document.querySelector(".big-img>*");
let images = document.querySelectorAll(".small-images>*");

if(big && images){
	for (let i = 0; i < images.length; i++) {
		images[i].addEventListener('click', () => {
			for(let j = 0; j < images.length; j++){
				if( images[j].classList.contains('active') ){ images[j].classList.remove('active') }
			}
			images[i].classList.add('active');
			big.src = images[i].src
		})
	}
}