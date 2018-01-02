"use strict";
{
	const init = () => {
		showSlideButtons();
		window.setInterval(showNextSlide, 8000);
		prev().addEventListener('click', showPrevSlide);
		next().addEventListener('click', showNextSlide);
	}

	const showSlideButtons = () => {
		showButton(prev());
		showButton(next());
	}
	
	const showButton = (button) => {
		button.classList.remove('hidden');
		button.classList.add('visible');
	}
	
	const showNextSlide = () => {
		slides()[currentslide].classList.remove('active');
		let nextslide = (currentslide === 4) ? 0 : (currentslide + 1);		
		slides()[nextslide].classList.add('active');
		(currentslide == 4) ? currentslide = 0 : currentslide++;
	}
	
	const showPrevSlide = () => {
		slides()[currentslide].classList.remove('active');
		let prevslide = (currentslide === 0) ? 4 : (currentslide - 1);		
		slides()[prevslide].classList.add('active');
		(currentslide == 0) ? currentslide = 4 : currentslide--;
	}
	
	const slides = () => $$('.slide');
	let currentslide = 0;
	
	const prev = () => $('.prev');
	const next = () => $('.next');

	init();
}