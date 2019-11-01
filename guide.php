<?php

session_start();
		if(!isset($_SESSION['username']))

{

header("Location: index.php");

}
else

{

$user=$_SESSION['username'];
	
$team=$_SESSION['team'];
include('dbconfig.php');

$table=$_SESSION['table'];
$query="SELECT username FROM res_$table WHERE username='$user'";
$result=mysqli_query($dbconfig,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if(mysqli_num_rows($result)!=0)

{
$_SESSION['atm']=1;
	header('location:play.php');

}

else	

{



	$lol=mysqli_query($dbconfig,"INSERT INTO res_$table (username,teamname) VALUES ('$user','$team')");

	if($lol)

	{
		date_default_timezone_set("Asia/Kolkata");
		$_SESSION['stime']=date("M d Y H:i:s");
		$_SESSION['start']=1;
		
		if($_SESSION['lev']!=3)
		header("location:pre.php");
		else
			header('location:play.php');

	}

	

}




}

?>