<?php
session_start();
if((!isset($_SESSION['username'])))
	{
		header("location:index.php");
	}
	?>

<html>
   <head>
	    <link rel="stylesheet" href="Assets/css/style.css">
     
     
 <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
   <title>Rules</title>
   
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head> 
      <body>
     
      
   <center>	
		<div class="divlead">
	   <center><h3>RULES</h3></center>
	   <ul style='align:left;'><li>1.The Event will last for a total of 10 min and no extra time will be provided to any participant</li><br>
		   <li>2.It will contain a total of 20 questions with no specific time on every single question</li><br>
		   <li>3. You will not be allowed to move to the next question before answering the current one.</li><br>
<li>4. Every time you get a question wrong, the weightage of the next question decreases by 50 points. </li><br>
		   <li>5.The right to declare any answer correct and incorrect will be retained by EDC.</li><br>
</ul></div><br><br>
		  <?php
		  $now=strtotime('now');
		  if(!$_SESSION['is_admin'] && $now<strtotime('25 January 2020 22:00:00'))
		  { $time=strtotime("25 January 2020 22:00:00")-strtotime('now');
		  echo '<div style="color:white; font-size:23px;">Event will start in <div id="clockdiv" style="
   //zoom: 0.4;
		//-moz-transform: scale(0.4);
		  text-align:center;">
	<div><span class="days" id="days">00</span><div class="smalltext">Days</div></div>
	<div><span class="hours" id="hours">00</span><div class="smalltext">Hours</div></div>
	<div><span class="minutes" id="minutes">00</span><div class="smalltext">Minutes</div></div>
	<div><span class="seconds" id="seconds">00</span><div class="smalltext">Seconds</div></div>
	</div></div><form method="post" action="" name="finalSubmit"></form>
	<script type = "text/javascript">

	var deadline = '.$time.'
var t = deadline ;
var downloadTimer = setInterval( function () {
	t--;
	var seconds = Math . floor( ( t ) % 60 );
	var minutes = Math . floor( ( t / 60 ) % 60 );
	var hours = Math . floor( ( t / ( 60 * 60 ) ) % 24 );
	var days = Math . floor(t / ( 60 * 60 * 24 ));
	document . getElementById( "days" ) . textContent = ( \'0\' + days ) . slice( -2 );
	document . getElementById( "hours" ) . textContent = ( \'0\' + hours ) . slice( -2 );
	document . getElementById( "minutes" ) . textContent = ( \'0\' + minutes ) . slice( -2 );
	document . getElementById( "seconds" ) . textContent = ( \'0\' + seconds ) . slice( -2 );
	if ( t <= 0 ) {
		clearInterval( downloadTimer );
		document . finalSubmit . submit();
	}
}, 1000 );



</script>';}
		  else 
			 echo'
		<form action="lev1.php" target="_parent" method="post">
			<input type="submit" id="button" value="Start">
		</form>';
			 ?></center>
		</body>
</html>
