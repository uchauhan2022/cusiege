<?php

session_start();
include('dbconfig.php');
	if(!isset($_SESSION['username']))
	{
		header("location:../../index.php");
	}
else{
	$query=mysqli_query($dbconfig,"SELECT level FROM login WHERE username='".$_SESSION['username']."' ");

	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	$_SESSION['lev']=$row['level'];
	header("location:../../play.php");
}
		

?>