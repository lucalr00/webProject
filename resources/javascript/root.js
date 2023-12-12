
$(document).ready(function() {
	console.log("DOM ready: root.js");
	navHighlight();
});

function navHighlight() {
	$('a').each(function() {
		if ($(this).prop('href') == window.location.href) {
			$(this).addClass('active');
		}
	});
	console.log("nav link highlighted: root.js");
};

function responsiveNav() {
	var x = document.getElementById("navBar");
	var y = document.getElementById("menuLink");
	let closeIcon = document.getElementById("closeMenu");
	let openIcon = document.getElementById("openMenu");
	if (x.className === "headerNav") {
		x.className += "Responsive";
		y.className += "Opened";
		closeIcon.style.display = "block";
		openIcon.style.display = "none";
	} else {
		x.className = "headerNav";
		y.className = "menuLink";
		closeIcon.style.display = "none";
		openIcon.style.display = "block";
	}
}

