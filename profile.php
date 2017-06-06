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
    <link rel='icon' href='favicon.ico'>

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
      <li><a href="logout.php" data-vivaldi-spatnav-clickable="1" style="color: yellow">Logout</a></li>
  </ul>
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







//echo $_SESSION['uid'];
$sql = "SELECT * FROM journey where uid=".$_SESSION['uid'];
$result = $conn->query($sql);
$count=0;
if ($result) {
    // output data of each row
echo "
<br><br>
      <div>
        <h1>Your Ride Offers</h1>
        <p>Here's are all your offers</p>
      </div>
<form method='post' action='dropride.php'><br><br>";
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/
      $count++;
      echo "<div style='float:left;margin: 0 0 50px 50px;'><blockquote>";
      echo "<h3> Ride #".$count."</h3>";
      echo "<p>".$row["j_start"]."</p>";
      echo "<p>".$row["j_finish"]."<p>";
      echo "<p>".$row["j_date"]."<p>";
      echo "<p>".$row["j_time"]."<p>";

      $_SESSION['sdj_id']=$row["j_id"];
      echo "<button class= 'btn btn-success' type='submit'>Drop ride</button></td></tr><br/>";
echo "</blockquote></div>";
//  header('Content-type: image/jpg');
      // echo $content;
//      echo '<img src="data:image/jpeg;base64,'.base64_encode($content->load()) .'" />';

 //echo "< img src = ".$image_content." width=200 height=200 >";


    }
} else {
    echo "<h3> Oh. This work like Give and take bro..<br>";
}

$sql = "SELECT * FROM users where id=".$_SESSION['uid'];
$result = $conn->query($sql);
if ($result) {
    $row = $result->fetch_assoc();
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/
      echo "<blockquote>";
      echo '<img src="uploads/20161227_110447.jpg" width="300px" >';
      echo '<h1>'.$row["first_name"].' '.$row["last_name"].'</h1>';
      echo "<p>".$row["email"]."</p>";
      echo "<p><a href= '".$row["link"]."' class='btn btn-success'>Google+ profile</a><p>";
      echo "</blockquote>";

//  header('Content-type: image/jpg');
      // echo $content;
//      echo '<img src="data:image/jpeg;base64,'.base64_encode($content->load()) .'" />';

 //echo "< img src = ".$image_content." width=200 height=200 >";
    }
} else {
    echo "0 results";
}
?>
</form>
<br><br><br><br>
</div>
      <div class="container">
<form method = "post" action="cancel_ride.php">
<?php
$sql = "SELECT * FROM booked,journey where booked.uid=".$_SESSION['uid']." and booked.jid = journey.j_id";
$result = $conn->query($sql);
$count=0;
if ($result) {

    echo "<h1>Your purchased rides </h1>
        <p>Here's are all your rides</p>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/
      $count++;
      echo "<div style='float:left;margin: 0 0 50px 50px;'><blockquote>";
      echo "<h3> Ride #".$count."</h3>";
      echo "<p>".$row["j_start"]."</p>";
      echo "<p>".$row["j_finish"]."<p>";
      echo "<p>".$row["j_date"]."<p>";
      echo "<p>".$row["j_time"]."<p>";

      $_SESSION['cj_id']=$row["j_id"];
      echo "<button class= 'btn btn-success' type='submit'>Cancel Purchase</button></td></tr><br/>";
echo "</blockquote></div>";
/*
$sql = "SELECT * FROM book,journey where book.u_id='31'";
$result = $conn->query($sql);
$count=0;
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";
      $count++;
      echo "<h1> Ride #".$count."</h1>";
      echo "<p>".$row["j_start"]."</p>";
      echo "<p>".$row["j_finish"]."<p>";
      echo "<p>".$row["j_date"]."<p>";
      echo "<p>".$row["j_time"]."<p>";

//  header('Content-type: image/jpg');
      // echo $content;
//      echo '<img src="data:image/jpeg;base64,'.base64_encode($content->load()) .'" />';

 //echo "< img src = ".$image_content." width=200 height=200 >";


  */  }
}
else
{
    echo "<h3>Seems you haven't purchased any rides </h3><br><br><br>";
}
$conn->close();

?>
</form>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
