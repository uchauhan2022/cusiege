<?php
session_start();
if((!isset($_SESSION['username'])))
	{
		header("location:index.php");
	}
	
	?>
	<!doctype html>
<html>
<head>
 <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
<meta charset="utf-8">
<title>Play</title>
   <link rel='stylesheet' href='Assets/css/style.css'>
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>
  <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>
<body>
<br>
	<div id="clockdiv" style="
    zoom: 0.5;
    -moz-transform: scale(0.5);">
	<div><span class="hours" id="hours">00</span><div class="smalltext">Hours</div></div>
	<div><span class="minutes" id="minutes">00</span><div class="smalltext">Minutes</div></div>
	<div><span class="seconds" id="seconds">00</span><div class="smalltext">Seconds</div></div>
</div
</body>
</html>
 <script type="text/javascript">
	var xmlHttp;
function srvTime(){
    try {
        //FF, Opera, Safari, Chrome
        xmlHttp = new XMLHttpRequest();
    }
    catch (err1) {
        //IE
        try {
            xmlHttp = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch (err2) {
            try {
                xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch (eerr3) {
                //AJAX not supported, use CPU time.
                alert("AJAX not supported");
            }
        }
    }
    xmlHttp.open('HEAD',window.location.href.toString(),false);
    xmlHttp.setRequestHeader("Content-Type", "text/html");
    xmlHttp.send('');
    return xmlHttp.getResponseHeader("Date");
}
	 var deadline = Date.parse(<?php echo '"'.$_SESSION['stime'].'"';?>)+1800000;

var st = srvTime();
    var t = (deadline-Date.parse(new Date(st)))/1000;
    var downloadTimer = setInterval(function(){
    t--;
	var seconds = Math.floor( (t) % 60 );
	var minutes = Math.floor( (t/60) % 60 );
	var hours = Math.floor( (t/(60*60)) % 24 );
		document.getElementById("hours").textContent=('0'+hours).slice(-2);
		document.getElementById("minutes").textContent=('0'+minutes).slice(-2);
		document.getElementById("seconds").textContent=('0'+seconds).slice(-2);
    if(t <= 0)
        clearInterval(downloadTimer);
    },1000);
	


</script> 
