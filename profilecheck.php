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
	if($_SESSION['lselect']=="login")
		  header("Location: profile.php");
	else 
	if($_SESSION['lselect']=="book")
		  header("Location: book.php");
	else 
	if($_SESSION['lselect']=="offer_ride")
		  header("Location: create_vehicle_main.php");
	else 
	if($_SESSION['lselect']=="main")
		  header("Location: main.php");
	else 
	if($_SESSION['lselect']=="join_ride")
		  header("Location:home_join_ride.php");
	else
	{
		header("Location:profile.php");
	}


}
?>
