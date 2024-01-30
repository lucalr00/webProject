document.addEventListener("DOMContentLoaded", () => {
	console.log("DOM ready: aboutUs.js");
	startScript(1);
});

let slideIndex = 1; //global
let details = 0;

document.addEventListener('keydown', function(event) {
	if (event.keyCode == 37) {
		plusSlides(-1);
	}
	else if (event.keyCode == 39) {
		plusSlides(1);
	}
});

function startScript(n) {
	let i;
	let slides = document.getElementsByClassName("card");
	let dots = document.getElementsByClassName("dot");
	if (n > slides.length) { slideIndex = 1 }
	if (n < 1) { slideIndex = slides.length }
	for (i = 0; i < slides.length; i++) {
		slides[i].className = "card hidden";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = "dot -active";
		dots[i].setAttribute('aria-selected', 'false');
	}

	dots[slideIndex - 1].className = "dot active";
	slides[slideIndex - 1].className = "card visible";
	dots[slideIndex - 1].setAttribute('aria-selected', 'true');

	let details = document.getElementsByClassName("cardDetails");
	for (i = 0; i < details.length; i++) {
		details[i].className = "cardDetails hidden";
	}
	console.log("details closed: aboutUs.js");
};

function plusSlides(n) {
	showSlides(slideIndex += n);
}

function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	let i;
	let slides = document.getElementsByClassName("card");
	let dots = document.getElementsByClassName("dot");
	if (n > slides.length) { slideIndex = 1 }
	if (n < 1) { slideIndex = slides.length }
	for (i = 0; i < slides.length; i++) {
		slides[i].className = "card hidden";
		slides[i].tabIndex = 0;
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = "dot -active";
		dots[i].setAttribute('aria-selected', 'false');
	}

	dots[slideIndex - 1].className = "dot active";
	dots[slideIndex - 1].setAttribute('aria-selected', 'true');
	slides[slideIndex - 1].className = "card visible";
	slides[slideIndex - 1].tabIndex = -1;
	slides[slideIndex - 1].focus();
	if (details == true) { showDetails(); }
	else { closeDetails(); }
}

function showDetails() {
	details = 1;
	let i;
	var slides = document.getElementsByClassName("cardDetails");
	for (i = 0; i < slides.length; i++) {
		slides[i].className = "cardDetails hidden";
	}
	slides[slideIndex - 1].className = "cardDetails visible";
	slides[slideIndex - 1].tabIndex = -1;
	slides[slideIndex - 1].focus();
	console.log("details opened: aboutUs.js");
}

function closeDetails() {
	details = 0;
	var slides = document.getElementsByClassName("cardDetails");
	var card = document.getElementsByClassName("card visible");
	for (i = 0; i < slides.length; i++) {
		slides[i].className = "cardDetails hidden";
		slides[i].tabIndex = 0;
	}
	card[0].tabIndex = -1;
	card[0].focus();
	console.log("details closed: aboutUs.js");
}

