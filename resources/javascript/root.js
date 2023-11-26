
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

