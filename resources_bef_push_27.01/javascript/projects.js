document.addEventListener("DOMContentLoaded", () => {
	console.log("DOM ready: projects.js");
	startScript();
});

let slideIndex = 1;

function startScript() {
	showSlide(slideIndex);
};

function showFirstSlide() {
    let slide = document.getElementsByClassName("slide_content");
    slide[0].style.display = "block";
}

function showSlide(currentIndex)
{
    let index;
    let slide = document.getElementsByClassName("slide_content");
    let dots = document.getElementsByClassName("dot");
    
    if(currentIndex > slide.length)
    {
        slideIndex = 1;
    }
    if(currentIndex < 1)
    {
        slideIndex = slide.length;
    }
    
    for(index = 0; index < slide.length; ++index)
    {
        slide[index].style.display = "none";
    }

    for (index = 0; index < dots.length; index++) {
        dots[index].className = dots[index].className.replace(" active", "");
    }

    slide[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

function currentSlide(currentIndex) {
	showSlide(slideIndex = currentIndex);
}

function plusSlides(currentIndex) {
	showSlide(slideIndex += currentIndex);
}