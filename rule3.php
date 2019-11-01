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
   <link rel='stylesheet' href='Assets/css/1.css'>
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head> 
      <body>
     
      
   <center>	
		<embed src="L3.pdf" height="85%" width="100%" type="application/pdf"></embed><br><br>
		<form action="lev3" target="_parent" method="post">
			<input type="submit" id="button" value="Start">
		</form></center></body>
</html>
