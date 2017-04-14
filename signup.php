<?php
session_start();

if(isset($_SESSION['user']) != ""){
header("Location: home.php");
}

include_once 'dbconnect.php';

if(isset($_POST['signup_btn'])) {
$username = $_POST['usrname'];
$email = $_POST['email'];
$password = $_POST['password'];


if(mysqli_query($conn,"INSERT INTO user (u_name,email,password) VALUES('$username','$email','$password')")){
echo("Registration Successful");
}
else{
echo("Registration Failed");
}

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tutorial - 01</title>
</head>
<body>
<center>
<div>
<form method="post">
<table align="center" width="30%" border="0">
<tr>
<td><input type="text" name="usrname" placeholder="UserName" required /></td>
</tr>
<tr>
<td><input type="email" name="email" placeholder="Your_Email" required /></td>
</tr>
<tr>
<td><input type="password" name="password" placeholder="Your_Password" required /></td>
</tr>
<tr>
<td><button type="submit" name="signup_btn">Sign Up</button></td>
</tr>
<tr>
<td><a href="index.php">Sign In</a></td>
</tr>
</table>
</form>
</div>
</center>
</body>
</html>
