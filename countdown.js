if(typeof(EventSource) !== "undefined") {
            var source = new EventSource("countdown.php");
            source.onmessage = function(event) {
            document.getElementById("countdown").innerHTML = event.data;
            };
} else {
	document.getElementById("countdown").innerHTML = "Valimised lõppevad 28. juunil 2015 kell 20:00";
	}