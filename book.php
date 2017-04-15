<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Book Your Ride</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"  />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>


<body>
  <div class="jumbotron" >
    <div id="headp">


  <h1>Book Your Ride</h1>
  <p>Find out more deatils about your ride and book before its too late..</p>
</div>
</div>
<div class="container">


<?php

session_start();
include_once 'dbconnect.php';

//$jid=$_POST['j_id'];

$sql = 'SELECT * FROM journey where j_id=$_SESSION["j_id"]';
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      echo "<h1>Ride Summary</h1>";
echo "<blockquote> ";
       echo "Starting Point: ". $row["j_start"]."<br>". "Destination: " . $row["j_finish"]."<br>". "Date: " . $row["j_date"]."<br>".  "Time: " . $row["j_time"]."<br>". "Journey Description: " . $row["j_desc"]. "<br>";
      //echo "<h1>".$row["u_name"]."</h1>";
    $u=$row["u_id"];
    $v=$row["v_id"];
echo "</blockquote>";

    }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM user where u_id='1'";
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/

      echo "<h1>"."Offered by"."</h1>"."<br>";
echo "<blockquote> ";
      echo "Name:".$row["u_name"]."<br>"."Gender:".$row["gender"]."<br>"."Bio:".$row["bio"]."<br>";

echo "</blockquote>";
    }
} else {
    echo "0 results";
}
$sql = "SELECT * FROM vehicle where v_id='1' ";
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/

      echo "<h1>"."Vehicle Description"."</h1>";
      echo "<blockquote> ";
 echo "Model Name:".$row["v_model"]."<br>"."Registration Number:".$row["v_rno"]."<br>"."Number of seats left:".$row["v_seat"]."<br>"."Vehicle Description".$row["v_desc"];
echo "</blockquote>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<br>
<br />
<br />
<form class="form-horizontal">
  <form method="post" action="insert_booking.php">
  <div class="form-group">
    <!-- <label for="inputEmail" class="col-lg-2 control-label">Enter the number of seats required</label>-->
     <div class="col-lg-10">
       <input type="number" name="bookeds" class="form-control" id="inputseat" placeholder="Number of Seats Required">
     </div>
   </div>
   <br />
   <br />

   <div class="form-group">
         <div class="col-lg-10 col-lg-offset-2">
           <button type="reset" class="btn btn-default">Cancel</button>
           <button type="submit" class="btn btn-success">Book!</button>
         </div>
       </div>


       <br>
       <br />
       <br />
</form>
</div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
