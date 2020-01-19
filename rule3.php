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
		  if(!$_SESSION['is_admin'] && $now<strtotime('26 January 2019 22:00:00'))
		  echo '<div style="color:white; font-size:23px;">Event will start at 9:30 PM.</div>';
		  else 
			 echo'
		<form action="lev1.php" target="_parent" method="post">
			<input type="submit" id="button" value="Start">
		</form>';
			 ?></center>
		</body>
</html>
