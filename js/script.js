var interval = window.setInterval("uhr_anzeigen()", 1000);

function uhr_anzeigen() {
	var Datum = new Date();
	var stunde = Datum.getHours();
	var minute = Datum.getMinutes();
	var sekunde = Datum.getSeconds();

	Zeit = ((stunde < 10) ? " 0" : " ") + stunde;
	Zeit += ((minute < 10) ? ":0" : ":") + minute;
	Zeit += ((sekunde < 10) ? ":0" : ":") + sekunde;
	Zeit += " Uhr";

	document.getElementById('uhr').innerHTML=Zeit;
}


var updateDiv = function ()
{
  $('#news').load('http://10.85.0.36/includes/news.php', function () {
    deinTimer = window.setTimeout(updateDiv, 10000);
  });
};
var deinTimer = window.setTimeout(updateDiv, 10000);

