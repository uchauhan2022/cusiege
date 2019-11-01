<?php
session_start();
include('pre3.php');
include('Assets/php/dbconfig.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{	
$q=$_POST['delete'];
$user=$_POST['user'];
	if($_SESSION['done'][$q]==1)
	{
		$_SESSION['oi']=1;
		header('location:godmode.php');
	}
	else{
		$lol=mysqli_query($dbconfig,"DELETE FROM check_req WHERE username='$user'");
		$lol1=mysqli_query($dbconfig,"UPDATE res_lev3 SET score=score-1 WHERE username='$user'");
		$_SESSION['ds']=1;
		header('location:godmode.php');
			
	}
	
}
?>