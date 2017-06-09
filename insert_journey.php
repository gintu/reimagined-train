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
echo "Connected successfully";
$start=$_POST['start'];
$finish=$_POST['finish'];
$date=$_POST['date'];
$time=$_POST['time'];
$fare=$_POST['fare'];
$rdesc=$_POST['rdesc'];
/*echo $_POST['rtrip'];
echo $_POST['lug'];
echo $_POST['depflex'];*/



//$sql = "INSERT INTO journey (j_start, j_finish, j_date,j_time,j_fare,j_desc,uid,seats,sel,rtrip,lug) VALUES ('$start', '$finish', '$date','$time','$fare','$rdesc',".$_SESSION['uid'].",".$_POST['seats'].",0)";
$sql = "INSERT INTO journey (j_start, j_finish, j_date,j_time,j_fare,j_desc,uid,seats,sel,rtrip,lug,depflex) VALUES ('$start', '$finish', '$date','$time','$fare','$rdesc',".$_SESSION['uid'].",".$_POST['seats'].",0,'".$_POST['rtrip']."','".$_POST['lug']."','".$_POST['depflex']."')";	

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: create_vehicle_main.php');
?>
