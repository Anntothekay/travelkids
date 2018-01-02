'use strict';
{
	const init = () => {
		initCheckForMatches();
		checkboxes().addEventListener("click", disableSelectBoxes);
	}

	const initCheckForMatches = () => {
		radiobuttons().forEach((radiobutton) => {

				if (!(valueCheckedBoxes().includes(radiobutton.value))) {
					radiobutton.disabled = true;
					radiobutton.checked = false;				
				}			
		});
	}

	const disableSelectBoxes = (e) => {
		if (e.target.checked) {
			radiobuttons().forEach((radiobutton) => {
				if (e.target.value === radiobutton.value) {
					radiobutton.disabled = false;
				}
			});
		} else {
			radiobuttons().forEach((radiobutton) => {
				if (e.target.value === radiobutton.value) {
					if (radiobutton.checked) {
						radiobutton.checked = false;
					};
					radiobutton.disabled = true;
				}
			});
		};	
	}

	const checkboxes = () => $$("[type='checkbox']");
	const checkedBoxes = () => $$(".picture > input[checked='checked']");
	const radiobuttons = () => $$(".thumbnail > input");

	const valueCheckedBoxes = () => checkedBoxes().map((checkedBox) => checkedBox.value);

	init();
}