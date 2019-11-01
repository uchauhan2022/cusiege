<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:index.php');
elseif($_SERVER['REQUEST_METHOD']=="POST")
{
	$score=0;
	$tie=0;
	$normal=0;
	$table=$_SESSION['table'];
	$user=$_SESSION['username'];
	for($i=1;$i<=$_SESSION['numq'];$i++)
	{
		if($_SESSION['gans'][$i]==$_SESSION['cans'][$i])
			{
				$score++;
				if($_SESSION['tie'][$i]==1)
					$tie++;
				else
					$normal++;
			}
	}
	include('Assets/php/dbconfig.php');
	date_default_timezone_set("Asia/Kolkata");
	$time=strtotime(date("M d Y H:i:s"))-strtotime($_SESSION['stime']);
	$lol=mysqli_query($dbconfig,"UPDATE res_$table SET score=$score,tie=$tie,normal=$normal,time=$time WHERE username='$user'");
	if($lol)
	{
		$_SESSION['check']=1;
		header('location:finish.php');
	}
	
}
?>