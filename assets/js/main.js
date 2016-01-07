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

        var dueDates = document.getElementsByClassName("task-date");

        for(i=0; i<dueDates.length; i++){
            if(dueDates[i].innerHTML == "2000-01-01"){
                dueDates[i].innerHTML = "";
            }else{
                var reverse = dueDates[i].innerHTML.split("-");
                dueDates[i].innerHTML = "Voor " + reverse[2] + "-" + reverse[1] + "-" + reverse[0];
            }
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