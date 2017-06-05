<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,"carpooldb");

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    
     $query1 = 'insert into booked values('.$_SESSION["uid"].','.$_SESSION["sj_id"].')';//.$_SESSION['uid'];
	 $query2 = 'update journey set sel=0,vid= '.$_SESSION["v_id"].'where j_id='.$_SESSION["sj_id"];
	 $result = $conn->query($query1);
	 $result = $conn->query($query2);
	 header("Location:profile.php");
?>