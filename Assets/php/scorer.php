<?php
session_start();
if(isset($_SESSION['username']))
	{include('dbconfig.php');
	$user=$_SESSION['username'];
	$sql_query="SELECT score,h,htime,school FROM leaderboards_cryptex WHERE username='$user'";
	$result=mysqli_query($dbconfig,$sql_query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count=mysqli_num_rows($result);
	if($count==1)
	{
		
		{
		$_SESSION['score']=$row['score'];
		$_SESSION['h']=$row['h'];
		$_SESSION['htime']=$row['htime'];
			$pass=1;
		}
	}
	else if ($count==0)
	{
		header("location:Assets/php/enter.php");
	}
	}
	else
	header("location:../../index.php")
	?>