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
      <li class="active"><a href="garage.php">Garage<span class="sr-only">(current)</span></a></li>
      <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer a Ride</a></li>
      <li><a href="home_join_ride.php" data-vivaldi-spatnav-clickable="1">Find a Ride</a></li>
      <li><a href="logout.php" data-vivaldi-spatnav-clickable="1" style="color: yellow">Logout</a></li>
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



$sql = "SELECT * FROM users where oauth_uid=".$_SESSION['uid'];
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/
      echo "<blockquote>";
      echo '<img src="'.$_SESSION['picture'].'" width="200px" style="border-radius:10%;" >';
      echo '<h1>'.$row["first_name"].' '.$row["last_name"].'</h1>';
      echo "<p>".$row["email"]."</p>";
      echo "<p>".$row["pno"]."</p>";
      echo "<p>".$row["gender"]."</p>";
      echo "<p class='text-muted'><i>".$row["bio"]."</i></p>";
      echo '<a href="create_profile.php" class = "btn btn-success">Update Your Profile</a>';
      echo "</blockquote>";

//  header('Content-type: image/jpg');
      // echo $content;
//      echo '<img src="data:image/jpeg;base64,'.base64_encode($content->load()) .'" />';

 //echo "< img src = ".$image_content." width=200 height=200 >";
    }
} else {
    echo "0 results";
}




//echo $_SESSION['uid'];
$sql = "SELECT * FROM journey where uid=".$_SESSION['uid'];
$result = $conn->query($sql);
$count=0;
        // output data of each row
    while($row = $result->fetch_assoc()) {
if($count==0)
{        echo "
                      <br><br>
                      <div>
                        <h1>Your Ride Offers</h1>
                        <p>Here's are all your offers</p>
                      </div>";
      }      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/
      echo "<div class='well' style='float:left;margin:2%;min-width:300px;'><form method='post' action='ride_details.php?dj_id=".$row['j_id']."&count=".($count+1)."'>";
      $count++;
      echo "<blockquote>";
      echo "<h3> Ride #".$count."</h3>";
      echo "<p>".$row["j_start"]."</p>";
      echo "<p>".$row["j_finish"]."<p>";
      echo "<p>".$row["j_date"]."<p>";
      echo "<p style='color:yellow;'> Seats Left :".$row["seats"]."<p>";
      echo "<button class= 'btn btn-success' type='submit'>See more details</button></td></tr>";
echo "</blockquote></form></div>";
//  header('Content-type: image/jpg');
      // echo $content;
//      echo '<img src="data:image/jpeg;base64,'.base64_encode($content->load()) .'" />';

 //echo "< img src = ".$image_content." width=200 height=200 >";

}
?>

</div>

      <div class="container">
<?php
$sql = "SELECT booked.seats as seats,j_start,j_finish,j_date,j_time,jid from booked,journey where booked.uid=".$_SESSION['uid']." and booked.jid = journey.j_id";
$result = $conn->query($sql);
$count=0;
    // output data of each row
    while($row = $result->fetch_assoc()) {
 if($count==0)
{    echo "<h1>Your purchased rides </h1>
              <p>Here's are all your rides</p>";
      }
            /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/
      $count++;
      echo "<div class='well' style='float:left;margin:2%;'><form method = 'post' action='cancel_ride.php?cj_id=".$row['jid']."'>";
      echo "<blockquote>";
      echo "<h3> Ride #".$count."</h3>";
      echo "<p>".$row["j_start"]."</p>";
      echo "<p>".$row["j_finish"]."<p>";
      echo "<p>".$row["j_date"]."<p>";
      echo "<p style='color:cyan;'>Reserved ".$row["seats"]." seat<p>";
      echo "<button class= 'btn btn-success' type='submit'>Cancel Purchase</button></td></tr><br/>";
echo "</blockquote></form></div>";
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

$conn->close();

?>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
