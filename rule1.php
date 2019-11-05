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
		<embed src="L1.pdf" height="85%" width="100%" type="application/pdf"></embed><br><br>
		  <?php
		  $now=strtotime('now');
		  if(!$_SESSION['is_admin'] && $now<strtotime('05 November 2019 21:30:00'))
		  echo 'Quiz will start ar 9:30 PM.';
		  else 
			 echo'
		<form action="lev1.php" target="_parent" method="post">
			<input type="submit" id="button" value="Start">
		</form>';
			 ?></center>
		</body>
</html>
