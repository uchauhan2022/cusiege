<?php
//ini_set('session.cookie_lifetime', 60 * 60 * 24 * 7); 
session_start();
if(isset($_SESSION['username']))
header("location:Assets/php/redirect.php")
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="Assets/css/style.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<title>Login</title>
  <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>

<body>
<div id="wrapperlog" class='divlog'><div class='divlog'><form method="post" action="Assets/php/login.php" >
               <center><img src="CCSLOGO.png" class="img">
               <?php if(isset($_SESSION["register"]))
               echo "<br><br> You've been sucessfully registered please LogIn to continue.";
               else if(isset($_SESSION["pass"]))
               echo "<br><br> Wrong Credentials.";
               ?>
                <h1><b>LOGIN</b></h1><input type="Textbox" placeholder="Username" id="textbox" name="username"><br><br>
            <input type="Password" placeholder="Password" id="textbox" name="password"><br><br><input type="submit" id="button" value="Login"><br><br>Need an account? <a href='signup.php'>Sign Up</a> </center>
        </form></div></div>
</body>
</html>