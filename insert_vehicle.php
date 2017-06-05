<?php


$servername = "localhost";
$username = "root";
$password = "";
session_start();

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

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["myimage"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["myimage"]["tmp_name"]);
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
if ($_FILES["myimage"]["size"] > 10000000) {
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
    if (move_uploaded_file($_FILES["myimage"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["myimage"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}


//$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

$sql = "INSERT INTO vehicle (v_model, v_rno, v_desc,v_seat,v_image_name,uid) VALUES ('$mname', '$rno', '$vdesc','$nos','$imagename',".$_SESSION['uid'].")";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully ack";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header("Location: home_join_ride.php"); /* Redirect browser */

?>
