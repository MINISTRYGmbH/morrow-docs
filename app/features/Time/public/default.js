(function(){
	var feature_time = document.getElementById('feature_time');

	function startTime() {
		var today	= new Date();
		var h		= today.getHours();
		var m		= today.getMinutes();
		var s		= today.getSeconds();
		var m		= checkTime(m);
		var s		= checkTime(s);

		if (feature_time.getAttribute('data-seconds')) {
			feature_time.innerHTML = h+":"+m+":"+s;
		} else {
			feature_time.innerHTML = h+":"+m;
		}

		var t = setTimeout(function(){startTime()},1000);
	}

	function checkTime(i) {
		if (i<10) {i = "0" + i};  // add zero in front of numbers < 10
		return i;
	}

	startTime();
})();
