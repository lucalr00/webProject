document.addEventListener("DOMContentLoaded", () => {
	console.log("DOM ready: aboutUs.js");
	startScript();
});

let slideIndex = 1; //global
let details = 0;

function startScript() {
	showSlides(slideIndex);
};

function showFirst() {
	let slides = document.getElementsByClassName("card");
	slides[0].style.display = "block";
}

// Next/previous
function plusSlides(n) {
	showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	let i;
	let slides = document.getElementsByClassName("card");
	if (n > slides.length) { slideIndex = 1 }
	if (n < 1) { slideIndex = slides.length }
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	slides[slideIndex - 1].style.display = "block";
	if (details == true) { showDetails(); }
	else { closeDetails(); }
}

function showDetails() {
	details = 1;
	let i;
	var slides = document.getElementsByClassName("cardDetails");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	slides[slideIndex - 1].style.display = "block";
	//if(slides[slideIndex].style.display === "block") {slides[slideIndex].style.display = "none"}
	console.log("details opened: aboutUs.js");
}

function closeDetails() {
	details = 0;
	var slides = document.getElementsByClassName("cardDetails");
	slides[slideIndex - 1].style.display = "none";
	console.log("details closed: aboutUs.js");
}
