<?php
session_start();
if((!isset($_SESSION['username'])))
	{
		header("location:index.php");
	}
	
	?>

<html>
   <head>
 <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
   <title>Rules</title>
   <link rel="stylesheet" href="Assets/css/style.css">
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head> 
      <body>
      <ul class="sub_navbarul">
  <li class="sub_navbarli"><a href="rules" active>Rules</a></li>
  <li class="sub_navbarli"><a href="play">Play</a></li>
  <li class="sub_navbarli"><a href="leaderboards">Leaderboards</a></li>
</ul>
      
   <div id="wrapperlead" class='divlead'> <div class='divlead'>
		<center><h1>Rules will go here.</h1></center>
		</div></div>

    </body>
</html>
