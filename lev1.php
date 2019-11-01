<?php
session_start();
if (!isset($_SESSION['username']))
	header("location: index.php");
else
{
	
	{
		$_SESSION['table']="lev1";
		$_SESSION['started']=1;
		header("location:play.php");
	}
}
?>