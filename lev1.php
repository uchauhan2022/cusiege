<?php
session_start();
if (!isset($_SESSION['username']))
	header("location: index.php");
else
{
	
	{
		$_SESSION['table']="lev1";
		header("location:guide.php");
	}
}
?>