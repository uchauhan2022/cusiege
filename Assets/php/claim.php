<?php
session_start();
include('dbconfig.php');
include("scorer.php");
if((!isset($_SESSION['username']))||($_SESSION['score']<1))
	{
		header("location:Assets/php/redirect.php");
	}
else if($_SERVER['REQUEST_METHOD']=="POST")	
{
$user=$_SESSION['username'];
$score=$_SESSION['score'];
	$h=$_SESSION['h'];
	$h=$h+1;
	$htime=strtotime($_SESSION['htime']);
		$now=strtotime("now");
		$ti=($now+7200)-$htime;
	if($ti<7200)
	die("Trying to be smart huh?");
	else
	{
	   $now1=date("d M Y H:i:s",strtotime("now")+19800);
	   $myfile = fopen("../../Entries/".$user.".txt", "a+");
    $txt = " Hint ".$h." Claimed at  -> Time : ".$now1."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
	$update=mysqli_query($dbconfig,"UPDATE leaderboards_cryptex SET h='$h' WHERE username='$user'");
	header("location:../../hints.php");}}?>