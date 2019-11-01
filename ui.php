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
 <link rel='icon' href='/favicon.ico' type='image/x-icon'>
<meta charset="utf-8">
<title>Play</title>
   <link rel='stylesheet' href='Assets/css/1.css'>
     
     <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel='icon' href='/favicon.ico' type='image/x-icon'>
</head>
  <link rel='icon' href='/favicon.ico' type='image/x-icon'>
</head>
<body><div id="wrapper" class='div'> <div class='div'>

<?php
if(isset($_GET['q']))
{
	$i=$_GET['q'];
	$_SESSION['i']=$i;
}
	if($_SESSION['lev']==3)
	{
		if(isset($_SESSION['lul']))
		{
			echo "<h4>OOPS! The question just TIMED-OUT!</h4>";
			unset($_SESSION['lul']);
		}
		if(isset($_SESSION['cr']))
		{
			echo "<h4>Check request has been submitted.</h4>";
			unset($_SESSION['cr']);
		}
		if(isset($_SESSION['cr2']))
		{
			echo "<h4>You've a check request pending please wait for its completion.</h4>";
			unset($_SESSION['cr2']);
		}
	}
	if(isset($_SESSION['i']))
	{
		$i=$_SESSION['i'];
	if($_SESSION['save']==1)
	{
		echo "<h4>Your answer was saved successfully</h4>";
		unset($_SESSION['save']);
	}
	if($_SESSION['clear']==1)
	{
		echo "<h4>Your answer was cleared successfully</h4>";
		unset($_SESSION['clear']);
	}
	echo '<h2>Question '.$i.'</h2>';
	echo "<pre>".$_SESSION['q'][$i].'</pre><br><br><br>';
		if($_SESSION['lev']!=3)
		{
			echo '<form method="post" action="save.php" target="_parent">';
	if($_SESSION['text'][$i]==1)
	{
		echo '<input type=text id="textbox" name="'.$i.'" placeholder="Answer"';
		if(isset($_SESSION['gans'][$i]))
			echo ' value="'.$_SESSION['gans'][$i].'"';
		echo '><br><br>';
}
		else
		{
			
			echo "<h3>Options</h3>";
  					for($op=0;$op<4;$op++)
    				{
						echo '<div class="radiobtn"><input type="radio" name="'.$i.'" id="'.$op.'" value="'.$_SESSION['choices'][$i][$op].'"';
						if(isset($_SESSION['gans'][$i])&&$_SESSION['gans'][$i]==$_SESSION['choices'][$i][$op])
							echo 'checked="checked"';
						echo '><label for="'.$op.'">'.$_SESSION['choices'][$i][$op].'</label></div>';
						echo '<br> <br>';
						$aed++;
					}}
			echo '<input type="submit" value="Save Answer" id="button"></form><br><br>
			<form method="post" action="clear.php" target="_parent"><input type="submit" value="Clear Answer" id="button"></form>';
			
		}
	else{
		
		echo '<form method="post" action="req.php" target="_parent"><input type="submit" value="Check Request" id="button"></form>';
	}}

	
?>
	</div></div>	
</body>
</html>