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
     $query0 = 'select seats from journey where j_id = '.$_SESSION["sj_id"];
     $result = $conn->query($query0);
     $row = $result->fetch_assoc();
     echo $row['seats'].$_SESSION["sj_id"];
     if($row['seats']<=$_POST['rseats'])
     {
        $_SESSION["Message"] = "No enough seats !!!";
        header("Location:book.php");
     }
     else
     {
        $_SESSION["Message"] = "";        
         $query3 = 'update journey set seats = seats-'.$_POST["rseats"].' where j_id='.$_SESSION["sj_id"];
         $query1 = 'insert into booked values('.$_SESSION["uid"].','.$_SESSION["sj_id"].','.$_POST["rseats"].')';
    	 $result = $conn->query($query1);
    	 $result = $conn->query($query3);
    	// header("Location:booking_confirmed.php");
    }
?>