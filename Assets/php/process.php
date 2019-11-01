<?php
session_start();
include('dbconfig.php');
if((!isset($_SESSION['username']))||(!isset($_SESSION['score'])))
	{
		header("location:../../index.php");
	}
else if ($_SERVER['REQUEST_METHOD']=="POST")
{
	$user=$_SESSION['username'];
	$ans=mysqli_real_escape_string($dbconfig,$_POST['answer']);
	$level=$_SESSION['score'];
	$now=date("d M Y H:i:s",strtotime("now")+19800);
	$score=$level+1;
      $myfile = fopen("../../Entries/".$user.".txt", "a+");
    $txt = " -> Answer : ".$ans." -> Level : ".$level." -> Time : ".$now."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
	$query=mysqli_query($dbconfig,"SELECT answer FROM answers_cryptex WHERE level='$level'");
	$row=mysqli_fetch_array($query,MYSQLI_ASSOC);
	if($ans==$row['answer'])
	{
		$_SESSION['score']=$level;
		$update=mysqli_query($dbconfig,"UPDATE leaderboards_cryptex SET score='$score',time= CURRENT_TIMESTAMP,h=0 WHERE username='$user'");
 $myfile = fopen("../../Entries/".$user.".txt", "a+");
    $txt = "Crossed Level ".$level." at  --> Time ".$now."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    unset($_SESSION['wa']);
	}
	else
		{
			$_SESSION['wa']=1;
			}
		
	header("location:redirect.php");
}
	
?>