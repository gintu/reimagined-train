<?php

session_start();
include_once 'accesscheck.php';
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password,"carpooldb");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query1="select * from journey where v_id = ".$_GET['v_id'];
$result = $conn->query($query1);
if(empty($result->fetch_assoc()))
{
	$query1="delete from vehicle where v_id = ".$_GET['v_id'];
	$result = $conn->query($query1);
	header("Location:garage.php");
	$_SESSION['flag']=1;
}
else
{
	header("Location:garage.php?msg='unsuccessful'");
	$_SESSION['flag']=0;
}


?>