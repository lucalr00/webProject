
window.addEventListener('load', () => {
})


function responsiveNav() {
	var x = document.getElementById("navBar");
	var y = document.getElementById("menuLink");
	let closeIcon = document.getElementById("closeMenu");
	let openIcon = document.getElementById("openMenu");
	if (x.className === "headerNav") {
		x.className += "Responsive";
		y.className += "Opened";
		closeIcon.className = "material-symbols-outlined";
		openIcon.className = "material-symbols-outlined hidden";
	} else {
		x.className = "headerNav";
		y.className = "menuLink";
		closeIcon.className = "material-symbols-outlined hidden";
		openIcon.className = "material-symbols-outlined";
	}
}

window.addEventListener('resize', run => {
	var x = document.getElementById("navBar");
	var y = document.getElementById("menuLink");
	let closeIcon = document.getElementById("closeMenu");
	let openIcon = document.getElementById("openMenu");
	if (window.matchMedia(`(min-width: 600px)`).matches) {
		x.className = "headerNav";
		y.className = "menuLink";
		closeIcon.className = "material-symbols-outlined hidden";
		openIcon.className = "material-symbols-outlined";
	}
});

