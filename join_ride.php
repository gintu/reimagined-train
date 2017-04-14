<?php
session_start();
include_once 'dbconnect.php';
if (isset($_POST['Submit'])) {
$_SESSION['j_start'] = $_POST['StartLoc'];
$_SESSION['j_finish'] = $_POST['EndLoc'];
$_SESSION['j_date'] = $_POST['JDate'];
}
header('Location: select_ride.php');
?>
