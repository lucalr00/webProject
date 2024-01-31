document.addEventListener("DOMContentLoaded", () => {
	startScript();
});

document.addEventListener('keydown', function(event) {
	if (event.keyCode == 37) {
		plusSlides(-1);
	}
	else if (event.keyCode == 39) {
		plusSlides(1);
	}
});

let slideIndex = 1;
let firstLoad = true;

function startScript() {
	showSlide(slideIndex);
};

function currentSlide(index) {
	showSlide(index);
}

function showSlide(currentIndex) {
	let index;
	let slide = document.getElementsByClassName("slide_content");
	let dots = document.getElementsByClassName("dot");

	if (currentIndex > slide.length) {
		slideIndex = 1;
	}
	if (currentIndex < 1) {
		slideIndex = slide.length;
	}

	for (index = 0; index < slide.length; index++) {
		slide[index].className = "slide_content hidden";
		slide[index].tabIndex = 0;
	}

	for (index = 0; index < dots.length; index++) {
		dots[index].className = "dot disable";
		dots[index].setAttribute('aria-selected', 'false');
	}

	slide[slideIndex - 1].className = "slide_content visible";
	dots[slideIndex - 1].className = "dot enable";
	dots[slideIndex - 1].setAttribute('aria-selected', 'true');
	slide[slideIndex - 1].tabIndex = -1;
	if (!firstLoad) {
		slide[slideIndex - 1].focus();
	}else{
		firstLoad = false;
	}
}

function currentSlide(currentIndex) {
	showSlide(slideIndex = currentIndex);
}

function plusSlides(currentIndex) {
	showSlide(slideIndex += currentIndex);
}