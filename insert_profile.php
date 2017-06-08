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



$bdate=$_POST['bdate'];
$pno=$_POST['pno'];
$gender=$_POST['gender'];
$bio=$_POST['bio'];
/*$image=addslashes($_FILES["uimage"],["tmp_name"]);
$name=addslashes($_FILES["uimage"],["tmp_name"]);
$image=file_get_contents($image);
$image=base64_encode($image);*/
/*$imagename=$_FILES["uimage"]["name"];


$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["uimage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["uimage"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["uimage"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["uimage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["uimage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/
session_start();
//$imagetmp=addslashes (file_get_contents($_FILES['uimage']['tmp_name']));
echo $_SESSION['uid'];
//if(empty($imagename))
//    $imagename="null";
$sql = "update users set bdate= '".$bdate."', pno = '".$pno."', gender = '".$gender."', bio = '".$bio."' where oauth_uid = '".$_SESSION['uid']."'";


if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//header("Location: profile.php");
/*

//Get the content of the image and then add slashes to it

//Insert the image name and image content in image_table
$insert_image="INSERT INTO image_table VALUES('$imagetmp','$imagename')";

mysql_query($insert_image);*/
?>
