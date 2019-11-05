<?php
session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("dbconfig.php");
// username and password received from loginform
$username=mysqli_real_escape_string($dbconfig,$_POST['username']);
$password=mysqli_real_escape_string($dbconfig,$_POST['password']);
	$password=crypt($password, '$2a$07$CCSCodersUnderSiegelul$');
$sql_query="SELECT  userid,username,name,is_admin FROM login WHERE username='$username' and password='$password'";
$result=mysqli_query($dbconfig,$sql_query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$count=mysqli_num_rows($result);// If result matched $username and $password, table row must be 1 row
if($count==1)
{
	$_SESSION['userid']=$row['userid'];
$_SESSION['username']=$row['username'];
	$_SESSION['team']=$row['name'];
	$_SESSION['is_admin']=$row['is_admin'];
unset($_SESSION['pass']);
	$now=date("d M Y H:i:s",strtotime("now")+19800);
 $myfile = fopen("../../Entries/".$username.".txt", "a+");
    $txt = "Logged in at  --> Time ".$now."\n";
    fwrite($myfile, $txt);
    fclose($myfile);
header("location:redirect.php");
echo $_SESSION['username'];
}
else
{
$_SESSION['pass']=1;
header("location:../../index.php");
}
}
?>