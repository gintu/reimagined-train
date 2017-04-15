<?php
session_start();
include_once 'dbconnect.php';
/*
if(isset($_SESSION['user'])!="")
{
header("Location: home.php");
}
if(isset($_POST['login_btn']))
{
*/
$email = $_POST['email'];
$password = $_POST['password'];
$query = "SELECT * FROM user WHERE email='$email'";

$response = mysqli_query($conn,$query);
$row = mysqli_fetch_array($response);

if($row['password'] == $password)
{
header("Location: home.php");
$_SESSION['uname'] = $row['u_name'];
$_SESSION['uid'] = $row['u_id'];
//header("Location: home.php");
}
else{
echo("Wrong Credentials");
}


?>
