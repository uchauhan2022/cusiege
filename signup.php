<?php 
session_start();
if(isset($_SESSION['username']))
header("location:play.php")
?>
<html>

<head>
 <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
    <title>SignUp</title>
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="icon" href="mediaicon/favicon.ico" type="image/x-icon">
   <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link rel='icon' href='icon/favicon.ico' type='image/x-icon'>
</head>

<body> 
<div id="wrapperlog" class='divlog'><div class='divlog'><form method="post" action="Assets/php/su.php">
               <center><img src="CCSLOGO.png"  class="img">
               <?php
					if(isset($_SESSION['captcha']))
						echo '<br><br>Invalid Captcha';
					else if(isset($_SESSION["email"]))
					echo '<br><br>The Email address has already been registered.';
					else if(isset($_SESSION["ic"]))
					echo "<br><br>The Secret Code entered is invalid.";
					else if (isset($_SESSION["userex"]))
					echo "<br><br>The username is already taken. Please try using another username."?>
                <h1><b>SIGN UP</b></h1><input type="text" placeholder="Team Name" id="textbox" name="name" required><br><br><input type="email" placeholder="Email" id="textbox" name="email" required><br><br><input type="text" placeholder="Username" id="textbox" name="username" required><br><br><input type="text" placeholder="Secret Code" id="textbox" name="ic" required><br><br>
            <input type="Password" placeholder="Password" id="textbox2" name="password" required><br><br><input type="Password" placeholder="Confirm Password" id="textbox1" name="password1" required><br><br><input type="submit" id="button" value="SignUp"><br><br>Already have an account? <a href='index'>Log In</a>
 </center>
        </form></div></div>
</body>

</html>
<script type="text/javascript">
var password = document.getElementById("textbox2")
  , confirm_password = document.getElementById("textbox1");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;</script>