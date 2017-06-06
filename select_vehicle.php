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
$sql = 'SELECT j_id from journey ORDER BY j_id DESC LIMIT 1';
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$j_id = $row['j_id'];
     $query2 = 'update journey set v_id = '.$_SESSION["v_id"].' where j_id = '.$j_id;
	 $result = $conn->query($query2);
	 header("Location:journey_added.php");
?>