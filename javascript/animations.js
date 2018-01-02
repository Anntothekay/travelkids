"use strict";
{
  const init = () => {
		  window.addEventListener("load", toggleNavLogo);
		  window.addEventListener("scroll", toggleNavLogo);
		  window.addEventListener("resize", toggleNavLogo);
		  window.addEventListener("orientationchange", toggleNavLogo);
      /*window.addEventListener("click", toggleMenu);*/
  };

	const toggleNavLogo = () => {
		if (desktopquery().matches) {
			if (nav().getBoundingClientRect().top === 0 && navlogo().classList.contains("hidden")) {
				navlogo().classList.remove("hidden");
			} else if (nav().getBoundingClientRect().top > 0) {
				navlogo().classList.add("hidden");
			} else {
				navlogo().classList.remove("hidden");
			};
		}
	};
  
  /*const toggleMenu = (e) => {
    if(e.target === hamburger()) {
    nav().classList.toggle("showmenu");
    } else if (e.target !== nav() && e.target !== search()) {
      nav().classList.remove("showmenu");
    };
    
  };*/

  const navlogo = () => $(".navlogo");
  const nav = () => $("#topnav");
//  const hamburger = () => $(".hamburger");
  const search = () => $("#topnav input");
  
  let desktopquery = () => window.matchMedia( "(min-width: 761px)" );

  init();
}