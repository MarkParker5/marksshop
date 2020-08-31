// -----------------------------------------------------------
// 							NAVBAR
// -----------------------------------------------------------

let button		 = document.querySelector('nav.navbar button[aria-controls="navbarSupportedContent"]');
let navcollapse  = document.querySelector('nav.navbar #navbarSupportedContent');

button.addEventListener('click', () => {
	if(navcollapse.classList.contains('collapse')) navcollapse.classList.remove('collapse');
	else navcollapse.classList.add('collapse');
})