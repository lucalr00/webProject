
window.addEventListener('load', () => {

	var allLinks = document.getElementsByClassName("refLink");
	
	for(var link = allLinks.length - 1; link >= 0; --link) {
		if (allLinks[link].getAttribute('href') === "") {
			allLinks[link].className += "Blank";
			console.log("blank link hidden: home.js");
		}
	}
});