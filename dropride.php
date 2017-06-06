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

$query1="delete from journey where j_id = ".$_SESSION['sdj_id'];
$query2="delete from booked where jid=".$_SESSION['sdj_id'];
$result = $conn->query($query1);
$result = $conn->query($query2);
header("Location:profile.php");
?>