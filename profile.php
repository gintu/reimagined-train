<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Profile</title>

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
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" >#sharemyride</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
    <!--  <ul class="nav navbar-nav">
        <li class="active"><a href="#" data-vivaldi-spatnav-clickable="1">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#" data-vivaldi-spatnav-clickable="1">Link</a></li>

      </ul>

-->  
<ul class="nav navbar-nav navbar-right">
   <li><a href="create_profile.php" data-vivaldi-spatnav-clickable="1">Update Your Profile</a></li>
 </ul>
<ul class="nav navbar-nav navbar-right">
    <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer a Ride</a></li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home_join_ride.php" data-vivaldi-spatnav-clickable="1">Find a Ride</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div class="jumbotron" >
      <div id="headp">


  <h1>Your Profile</h1>
  <p>Here are all your Detalis</p>
</div>
</div>
<div class="container">


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
/*echo "Connected successfully";*/
/*$uname=$_POST['u_name'];
$email=$_POST['email'];
$bdate=$_POST['bdate'];
$pno=$_POST['pno'];
$gender=$_POST['gender'];
$bio=$_POST['bio'];


$sql = "INSERT INTO user (u_name, email, bdate,pno,gender,bio) VALUES ('$uname', '$email', '$bdate','$pno','$gender','$bio')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

$sql = "SELECT * FROM user where u_id='18'";
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/

      echo "<h1>".$row["u_name"]."</h1>";
      echo "<p>".$row["email"]."</p>";
      echo "<p>".$row["bdate"]."<p>";
      echo "<p>".$row["pno"]."<p>";
      echo "<p>".$row["bio"]."<p>";
      $image_name=$row["u_image_name"];
      $content = $row['u_image'];

//  header('Content-type: image/jpg');
      // echo $content;
      echo '<img src="data:image/jpeg;base64,'.base64_encode($content->load()) .'" />';

 //echo "< img src = ".$image_content." width=200 height=200 >";





    }
} else {
    echo "0 results";
}
$conn->close();

?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
