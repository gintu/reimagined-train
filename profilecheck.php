<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
echo $_SESSION["uid"];
// Create connection
$conn = mysqli_connect($servername, $username, $password,"carpooldb");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(!isset($_SESSION['uid']))
{
  header("Location: create_profile.php");
}
else {
  header("Location: profile.php");
}
?>
