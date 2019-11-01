<?php
session_start();
if(isset($_SESSION['username'])) 	
{
	$res=(($_POST['1']-1)*1000000)+(($_POST['2']-1)*100000)+(($_POST['3']-1)*10000)+(($_POST['4']-1)*1000)+(($_POST['5']-1)*100)+(($_POST['6']-1)*10)+(($_POST['7']-1));
	if($res==6531337)
	{
		$user=$_SESSION['username'];
		include('dbconfig.php');
	$update=mysqli_query($dbconfig,"UPDATE leaderboards_cryptex SET score='9' WHERE user='$user'");
}
	header("location:redirect.php");
	
}
?>