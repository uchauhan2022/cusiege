<?php
session_start();
include("dbconfig.php");
  
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	      
        
      
          
    
    $username=mysqli_real_escape_string($dbconfig,$_POST['username']);
    $password=mysqli_real_escape_string($dbconfig,$_POST['password']);
		$password=crypt($password, '$2a$07$CCSCodersUnderSiegelul$');
	
	$email=mysqli_real_escape_string($dbconfig,$_POST['email']);
	$name=mysqli_real_escape_string($dbconfig,$_POST['name']);
	$mobile=mysqli_real_escape_string($dbconfig,$_POST['mobile']);
    $sql_query="SELECT userid, username FROM login WHERE email='$email'";
    $result=mysqli_query($dbconfig,$sql_query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count=mysqli_num_rows($result);
    $sql_query1="SELECT username FROM login WHERE username='$username'";
    $result1=mysqli_query($dbconfig,$sql_query1);
    $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
    $count1=mysqli_num_rows($result1);
    if($count==1)
        {
            $_SESSION["email"]=1;
	        header("location:../../signup.php");
        }

    else if($count1==1)
        {
            $_SESSION["userex"]=1;
	        header("location:../../signup.php");
	        
        }
    else 
        {
					$sql="INSERT INTO login (email,username,number,password,name) VALUES ('$email','$username',$mobile,'$password','$name')";
                    $update=mysqli_query($dbconfig,$sql);
	                $_SESSION["register"]=1;
	                unset($_SESSION["userex"]);
	                unset($_SESSION["email"]);
	                unset($_SESSION["ic"]);
                    header("location:../../index.php");
                    echo $update;
                    echo $username;
            
			
		}
            
        }

?>