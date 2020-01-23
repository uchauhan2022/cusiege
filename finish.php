<?php
session_start();
?>
<html>
   <head>
 <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
   <title>Finish</title>
   <link rel="stylesheet" href="Assets/css/style.css">
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>
      <body>
      <div class='divlead'> 
      <center>
      <?php 
		  if (isset($_SESSION['start'])){
			  echo '<h4>Your test has been submitted successfully.</h4>';
		  }
		  else
			  
		  {
			  echo '<h4>You have been logged out.</h4>';
		  }
		  session_destroy();
		  ?>
		 
     	
     	<h4>Click <a href="index.php">here</a> to login again.</h4>
		  </center></div></body>
</html>