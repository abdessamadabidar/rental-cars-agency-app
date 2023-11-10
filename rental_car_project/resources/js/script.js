import 'boxicons'
/*==================== SHOW NAVBAR ====================*/
const showMenu = (headerToggle, navbarId) => {
	const toggleBtn = document.getElementById(headerToggle),
		nav = document.getElementById(navbarId);

	// Validate that variables exist
	if (headerToggle && navbarId) {
		toggleBtn.addEventListener("click", () => {
			// We add the show-menu class to the div tag with the nav__menu class
			nav.classList.toggle("show-menu");
			// change icon
			toggleBtn.classList.toggle("bx-x");
		});
	}
};
showMenu("header-toggle", "navbar");



/*==================== LINK ACTIVE ====================*/
const linkColor = document.querySelectorAll(".nav__link");

function colorLink() {
	linkColor.forEach((l) => l.classList.remove("active"));
	this.classList.add("active");
}

linkColor.forEach((l) => l.addEventListener("click", colorLink));

document.addEventListener("DOMContentLoaded", function () {
	/* ============================= Marques =================================== */
	let marqueBtn = document.getElementById("marqueBtn");
	let marqueRadios = Array.from(
		document.getElementsByClassName("radio-marque")
	);
	let marqueInput = document.getElementById("marque");

	/* ============================= Modeles =================================== */

	let modeleBtn = document.getElementById("modeleBtn");
	let modeleRadios = Array.from(
		document.getElementsByClassName("radio-modele")
	);
	let modeleInput = document.getElementById("modele");

	handleSelection(marqueBtn, marqueRadios, marqueInput);
	handleSelection(modeleBtn, modeleRadios, modeleInput);
});

function handleSelection(button, radios, input) {
	button.addEventListener("click", function () {
		radios.forEach(function (element) {
			if (element.checked) {
				input.setAttribute("value", element.value);
				input.nextElementSibling.innerHTML = "";
			}
		});
	});
}




