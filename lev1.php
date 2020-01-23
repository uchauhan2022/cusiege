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
		$query=mysqli_query($dbconfig,"UPDATE login SET start_time=CURRENT_TIMESTAMP where userid={$_SESSION['userid']}");
		$_SESSION['start_time']=strtotime("now");
		header("location:play.php");
	}
}
?>