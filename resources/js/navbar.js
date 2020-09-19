// -----------------------------------------------------------
// 							NAVBAR
// -----------------------------------------------------------

let button		 = document.querySelector('nav.navbar button[aria-controls="navbarSupportedContent"]');
let navcollapse  = document.querySelector('nav.navbar #navbarSupportedContent');

button.addEventListener('click', () => {
	if(navcollapse.classList.contains('collapse')) navcollapse.classList.remove('collapse');
	else navcollapse.classList.add('collapse');
})

let droplink  = document.querySelector('nav.navbar a#navbarDropdown');
let dropmenu  = document.querySelector('nav.navbar div[aria-labelledby="navbarDropdown"]');

droplink.addEventListener('click', () => {
	if(dropmenu.style.display == 'none') dropmenu.style.display == 'block';
	else dropmenu.style.display == 'none';
})

