if( "querySelector" in document &&
	"addEventListener" in window &&
	"getComputedStyle" in window) {

	window.document.documentElement.className += "javascript-enabled";
}

window.onload = function() {
	var navigation = document.getElementById("head");
	var navButton = document.getElementById("menuToggle");

	if (navButton) {
		navButton.addEventListener("click", function () {
			if (navigation.className == "open") {
				navigation.className = "closed";
			} else {
				navigation.className = "open";
			}
		});
	}

	var dueDates = document.getElementsByClassName("task-date");

	for (i = 0; i < dueDates.length; i++) {
		if (dueDates[i].innerHTML == "2000-01-01") {
			dueDates[i].innerHTML = "";
		} else {
			var reverse = dueDates[i].innerHTML.split("-");
			dueDates[i].innerHTML = "Voor " + reverse[2] + "-" + reverse[1] + "-" + reverse[0];
		}
	}
};