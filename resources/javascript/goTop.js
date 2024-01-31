
document.addEventListener("DOMContentLoaded", () => {
	backToTop();
});

function backToTop() {
	const showOnPx = 150;
	const backToTopButton = document.querySelector(".goUp")

	const scrollContainer = () => {
		return document.documentElement || document.body;
	};

	document.addEventListener("scroll", () => {
		if (scrollContainer().scrollTop > showOnPx) {
			backToTopButton.classList.remove("hidden")
		} else {
			backToTopButton.classList.add("hidden")
		}
	})

}

function goTop() {
	document.body.scrollIntoView({
		behavior: "smooth",
	});
};



