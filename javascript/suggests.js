"use strict";
{
	const init = () => {
			searchInput().addEventListener('keyup', displayMatches);
			searchInput().addEventListener('change', displayMatches);
		
	}
	
	const searchForMatch = (e) => {
		searchInput().value = e.currentTarget.innerText;		
    	searchForm().submit();
	}
	
	const displayMatches = (e) => {
		if (desktopquery().matches) { // disabled for smaller Displays		
			if(e.target.value) {		
				const matchArray = findMatches(e.target.value, datalistNoDupes(datalist()));
				const html = matchArray.map(travel => {
					const regex = new RegExp(e.target.value, 'g');
					const match = travel.replace(regex, `<span class="hl">${e.target.value}</span>`);

					return `<li>${match}</li>`
					;		  
				}).join('');
				suggestionList().innerHTML = html;

			} else {
				suggestionList().innerHTML = '';
			};

			listItems = $$('.suggest-list li');
			listItems.forEach(listitem => listitem.addEventListener('mousedown', searchForMatch));
		}
	}
	
	const findMatches = (wordToMatch, datalist) =>  {
  		return datalist.filter(travel => {
			const regex = new RegExp(wordToMatch, 'g');
			return travel.match(regex)
  		});
	}	

	const searchInput = () => $('#search');
	const searchForm = () => $('.searchform');
	const suggestionList = () => $('.suggest-list');

	let listItems = [];
	
	const desktopquery = () => window.matchMedia( "(min-width: 761px)" );

	init();
}