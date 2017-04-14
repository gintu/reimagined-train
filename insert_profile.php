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
$uname=$_POST['u_name'];
$email=$_POST['email'];
$bdate=$_POST['bdate'];
$pno=$_POST['pno'];
$gender=$_POST['gender'];
$bio=$_POST['bio'];
/*$image=addslashes($_FILES["uimage"],["tmp_name"]);
$name=addslashes($_FILES["uimage"],["tmp_name"]);
$image=file_get_contents($image);
$image=base64_encode($image);*/
$imagename=$_FILES["uimage"]["name"];
$imagetmp=addslashes (file_get_contents($_FILES['uimage']['tmp_name']));

$sql = "INSERT INTO user (u_name, email, bdate,pno,gender,bio,u_image,u_image_name) VALUES ('$uname', '$email', '$bdate','$pno','$gender','$bio','$imagetmp','$imagename')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


/*

//Get the content of the image and then add slashes to it

//Insert the image name and image content in image_table
$insert_image="INSERT INTO image_table VALUES('$imagetmp','$imagename')";

mysql_query($insert_image);*/
?>
