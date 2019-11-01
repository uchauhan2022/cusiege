<?php
session_start();
if((!isset($_SESSION['username'])))
	{
		header("location:index.php");
	}
	if($_SESSION['lev']==3)
		include('pre3.php');
	?>
	<!doctype html>
<html>
<head>
 <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
<meta charset="utf-8">
<title>Play</title>
 <?php if($_SESSION['lev']==3)
	echo'  <meta http-equiv="refresh" content="10"/>';?>
   <link rel='stylesheet' href='Assets/css/<?php
								if($_SESSION['lev']==3)
									echo "2";
								else
									echo'1';
								?>.css'>
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>
  <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>
<body>
<div id="wrapper1" class='div'> <div class='div'>
<center>
<h2><font color="white">Questions</font></h2>
<?php
		if($_SESSION['lev']!=3)
		{
       for($i=1;$i<=$_SESSION['numq'];$i+=2)
	   {
		   for($j=$i;$j<$i+2 && $j<=$_SESSION['numq'];$j++)
		   {
	   
		echo"<a href='ui.php?q=".$j."' target='ui' id='";
		   if(isset($_SESSION['gans'][$j]))
			   echo "button1";
		   elseif($_SESSION['tie'][$j]==1)
			   echo "button2";
		   else
			   echo "button3";   
		if($j==$_SESSION['i'])
			echo "active";
			   echo"' onClick='location.reload().delay(5000);'>   ".$j."  </a>&nbsp;&nbsp;&nbsp;&nbsp;";
		   }
		   echo "<br><br>";
		   }
				   
    		echo '<br><form method="post" action="check.php" name="finalSubmit" target="_parent"><input id="button4" type="submit" value="Submit Test"></form>';}
	else
	{
		echo '<h3><font color="white">On Deck</font></h3>';
		for($i=1;$i<=$_SESSION['numq'];$i++)
	   {
		   
		    if($_SESSION['done'][$i]==0)
		   {
		   echo"<a href='ui.php?q=".$i."' onClick='location.reload(true);";
			  
				   echo "'target='ui' id='button3";
		   
		if($i==$_SESSION['i'])
			echo "active";
			   echo"' onClick='location.reload().delay(5000);'>   ".$i."  </a><br>";
		   }}
		echo '<h3><font color="white">Gone With The Wind</font></h3>';
		   for($i=1;$i<=$_SESSION['numq'];$i++)
	   
		   {
			   if($_SESSION['done'][$i]==1)
			   {
		   echo"<a ";
			  
				   echo "id='button3";
		   
			   echo"'>   ".$i."  </a>&nbsp;&nbsp;&nbsp;&nbsp;";
				    echo "<br>";
		   }
		  
	   }
	}?>
    		
	</center></div</div>
</body>
</html>