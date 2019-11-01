<?php
session_start();
include('dbconfig.php');
if (!isset($_SESSION['username']))
	header("location: index.php");
else
{
	
	{
		$_SESSION['table']="lev1";
		$_SESSION['start']=1;
		$query=mysqli_query($dbconfig,"INSERT INTO results (userid) VALUES ({$_SESSION['userid']})");
		header("location:play.php");
	}
}
?>