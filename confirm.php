<?php
session_start();
include('pre3.php');
include('Assets/php/dbconfig.php');
if($_SERVER['REQUEST_METHOD']=='POST')
{	
$q=$_POST['confirm'];
$user=$_POST['user'];
	if($_SESSION['done'][$q]==1)
	{
		$_SESSION['oi']=1;
		header('location:godmode.php');
	}
	else{
		
		$score=$_SESSION['score'][$q];
		$lol=mysqli_query($dbconfig,"UPDATE pre_lev3 SET done=1 WHERE questionid=$q");
		$lol1=mysqli_query($dbconfig,"UPDATE res_lev3 SET score=score+$score WHERE username='$user'");
		$_SESSION['cs']=1;
		header('location:godmode.php');
			
	}
	
}
?>