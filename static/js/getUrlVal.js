/* URL */
function getURLVar(key) {
	var val = {};
	var query = String(document.location).split('?');
	if (query[1]) {
		var part = query[1].split('&');
		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');
			if (data[0] && data[1]) {
				val[data[0]] = data[1];
			}
		}
		
		if (val[key]) {
			return val[key];
		} else {
			return val;
		}
	}
}

var $_GET = getURLVar();