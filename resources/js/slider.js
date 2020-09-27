'use strict'

// -----------------------------------------------------------
// 							SLIDER
// -----------------------------------------------------------

if(document.querySelector('.sliders')){
let parent  = document.querySelector('.thumbs');
let win 	= document.querySelector('.window');
let imgs 	= document.querySelectorAll('.thumbs>*');
console.log(imgs)
let width   = imgs[0].getBoundingClientRect().width;
let len 	= imgs.length+1;
let shift   = 0;
let k 		= 1;
let i 		= 1;
let inter;
parent.append(document.querySelectorAll('.thumbs>*')[0].cloneNode(true));
parent.append(document.querySelectorAll('.thumbs>*')[1].cloneNode(true));
parent.append(document.querySelectorAll('.thumbs>*')[2].cloneNode(true));
parent.append(document.querySelectorAll('.thumbs>*')[3].cloneNode(true));

function next(back = false){
	clearInterval(inter);
	k = back ? -1 : 1;
	let slide = setInterval( () => {
		if(back){
			k *= shift >= width*(i-1)-width/2 ? 1.2 : 0.85;
			shift += k;
			if(i==1){
				i = len;
				shift = width*(i-1);			}
			if(shift <= 1.05*(i-2)*width){
				i--;
				shift = (i-1)*width;
				clearInterval(slide);
			}
		}else{
			k *= shift <= width*i-width/2 ? 1.2 : 0.85;
			shift += k;
			if(i >= len){
				i = 1;
				shift = 0;
			};
			if(shift >= 0.99*i*width){
				shift = i*width;
				i++;
				clearInterval(slide);
			}
		}
		parent.style.left = -shift + 'px';
		set( (i-1)%(len-1) );
	},10);
	main();
}

function main() {
	shift -= shift%width;
	i = parseInt(shift/width + 1);
	inter = setInterval('next()', 9000);
}

let points = document.querySelectorAll('.points>*');
function set(id){
	for(let p = 0; p < len-1; p++) points[p].classList = [];
	points[id].classList = ['active'];
}


main();

let btns = document.querySelectorAll('.sliders .arrow');
for(let i = 0; i < 2; i++) btns[i].addEventListener('click', () => { next(!i) } );
}