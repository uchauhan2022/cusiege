<?php
session_start();
include('dbconfig.php');
if(!isset($_SESSION['username']))
{header("location:../../index.php");}
else
{
	$sql_query="SELECT name FROM login WHERE username='$user'";
	$result=mysqli_query($dbconfig,$sql_query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		$name=$row['name'];
	$sql_query=mysqli_query($dbconfig,"INSERT INTO leaderboard (username,time,name) VALUES ('$user',CURRENT_TIMESTAMP,'$name')");
		header("location:redirect.php");
	}
}
	
?>
