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
	   <ul style='align:left;'><li> Time- 1.5 hours </li><br>
<li>Venue- Online Individual Participation </li><br>
<li>1 Round 20 Questions </li><br>
<li>Base Weightage of Each question- 40 points</li><br>
<li>If some participant answers a question right, the value of that question decreases by 1 point, while if the question is answered wrong by a participant, the value of that increases by 1 point.</li><br>
 <li>If the participant answers right, then he/she is awarded the points according to the value of the question at the same time. </li><br>
<li>Any question can have a maximum weightage of 40 points. </li><br>
<li>The participant with the highest number of points emerges as the winner.</li><br>
 <li>In case of a tie, time would be the judge. The quicker, the better.</li><br>
</ul></div><br><br>
		  <?php
		  $now=strtotime('now');
		  if(!$_SESSION['is_admin'] && $now<strtotime('26 January 2020 22:00:00'))
		  { $time=strtotime("22 January 2020 20:00:00")-strtotime('now');
		  echo '<div style="color:white; font-size:23px;">Event will start in <div id="clockdiv" style="
    zoom: 0.4;
		  -moz-transform: scale(0.4);
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
