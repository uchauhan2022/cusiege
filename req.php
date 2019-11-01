<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:index.php');
elseif($_SERVER['REQUEST_METHOD']=="POST")
{
	
	$table=$_SESSION['table'];
	$user=$_SESSION['username'];
	$team=$_SESSION['team'];
	$q=$_SESSION['i'];
	include('Assets/php/dbconfig.php');
	include('pre.php');
	if($_SESSION['done'][$q]==1)
	{
		$_SESSION['lul']=1;
		unset($_SESSION['i']);
		header('location:play.php');
	}
	else{
		
	$query="SELECT username FROM check_req WHERE username='$user'";
$result=mysqli_query($dbconfig,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if(mysqli_num_rows($result)!=0)

{
$_SESSION['cr2']=1;
	header('location:play.php');

}
		else{
	$lol=mysqli_query($dbconfig,"INSERT INTO check_req (username,teamname,questionid) VALUES('$user','$team',$q)");
	
	if($lol)
	{
		$_SESSION['cr']=1;
		header('location:finish.php');
	}}
	
}}
?>