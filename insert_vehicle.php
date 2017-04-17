<?php
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

$mname=$_POST['mname'];
$rno=$_POST['rno'];
$vdesc=$_POST['vdesc'];
$nos=$_POST['nos'];
$imagename=$_FILES["myimage"]["name"];


//$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

$sql = "INSERT INTO vehicle (v_model, v_rno, v_desc,v_seat,v_image) VALUES ('$mname', '$rno', '$vdesc','$nos','$imagename')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header("Location: home_join_ride.php"); /* Redirect browser */

?>
