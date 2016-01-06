function javaScriptCheck(){
	if( "querySelector" in document && 
		"addEventListener" in window && 
		"getComputedStyle" in window){
		
		window.document.documentElement.className += "javascript-enabled";

		var navigation = document.getElementById("head");
		var navButton = document.getElementById("menuToggle");

		if(navButton){
			navButton.addEventListener("click", toggleNav());
		}
	}
}

function toggleNav(){
	var navigation = document.getElementById("head");

	if(navigation.className == "closed"){
		navigation.className = "open";
	} else{
		navigation.className = "closed";
	}
}