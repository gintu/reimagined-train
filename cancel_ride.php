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
$query3="select seats from booked where jid = ".$_GET['cj_id'];
$result = $conn->query($query3);
$row=$result->fetch_assoc();
$query1="delete from booked where jid = ".$_GET['cj_id'];
$query2="update journey set sel = 1, seats = seats + ".$row['seats']." where j_id = ".$_GET['cj_id'];
$result = $conn->query($query1);
$result = $conn->query($query2);
header("Location:profile.php");
?>