(function(){
	// get the DOM Element for the clock
	var feature_time	= document.getElementById('feature_time');

	// get the server time from the DOM element
	var data_time		= parseInt(feature_time.getAttribute('data-time'));

	// do we have to output seconds
	var data_seconds	= feature_time.getAttribute('data-seconds');

	function startTime() {
		// get all parts from a Date object
		var today	= new Date(data_time);
		var h		= today.getHours();
		var m		= today.getMinutes();
		var s		= today.getSeconds();
		var m		= checkTime(m);
		var s		= checkTime(s);

		// handle the data_seconds config parameter
		feature_time.innerHTML = h+":"+m;
		if (data_seconds) {
			feature_time.innerHTML += ":"+s;
		}

		// add 1000 milliseconds (1 second) to the current time
		data_time += 1000;
		
		// execute this function again in 1 second
		setTimeout(function(){startTime()},1000);
	}

	// this function adds zero in front of numbers < 10
	function checkTime(i) {
		return (i<10) ? "0" + i : i;
	}

	startTime();
})();
