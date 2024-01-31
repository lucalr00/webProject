document.addEventListener("DOMContentLoaded", () => {
	startScript();
});

let slideIndex = 1; //global
let details = 0;
let firstLoad = true;

document.addEventListener('keydown', function(event) {
	if (event.keyCode == 37) {
		plusSlides(-1);
	}
	else if (event.keyCode == 39) {
		plusSlides(1);
	}
});

function startScript() {
	showSlides(slideIndex);
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
	if (!firstLoad) {
		slides[slideIndex - 1].focus();

	}
	showDetails(0);
}

function showDetails(n) {
	if (details == 1) {
		details = 0
	} else {
		details = n;
	}
	let i;
	var slides = document.getElementsByClassName("cardDetails");
	var card = document.getElementsByClassName("card visible");
	for (i = 0; i < slides.length; i++) {
		slides[i].className = "cardDetails hidden";
	}
	if (details == 1) {
		slides[slideIndex - 1].className = "cardDetails visible";
		slides[slideIndex - 1].tabIndex = -1;
		slides[slideIndex - 1].focus();
	} else {
		card[0].tabIndex = -1;
		if (!firstLoad) {
			card[0].focus();
		}
		else {
			firstLoad = false;
		}
	}
}

