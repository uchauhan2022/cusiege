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
      <div id="wrapper" class='div'> <div class='div'>
      <center>
      <?php if($_SESSION['check']==1)
		echo '<h3>Your test has been submitted successfully.</h3>';
		  session_destroy();
		  ?>
     	<h4>You've been logged out.</h4>
     	<h4>Click <a href="index.php">here</a> to login again.</h4>
		  </center></div></div></body>
</html>