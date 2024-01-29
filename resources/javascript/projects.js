document.addEventListener("DOMContentLoaded", () => {
	console.log("DOM ready: projects.js");
	startScript();
});

let slideIndex = 1;

function startScript() {
	showSlide(slideIndex);
};

function currentSlide(index)
{
    showSlide(index);
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
    
    for(index = 0; index < slide.length; index++)
    {
        slide[index].className ="slide_content hidden";
    }

    for (index = 0; index < dots.length; index++) {
        dots[index].className = "dot disable"
    }

    slide[slideIndex - 1].className = "slide_content visible"
    dots[slideIndex - 1].className = "dot enable";
}

function currentSlide(currentIndex) {
	showSlide(slideIndex = currentIndex);
}

function plusSlides(currentIndex) {
	showSlide(slideIndex += currentIndex);
}