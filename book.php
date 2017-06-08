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
    <LINK REL="icon" HREF="favicon.ico">


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
  <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer a Ride</a></li>
</ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profile.php" data-vivaldi-spatnav-clickable="1">You</a></li>
    </ul>
  </div>
</div>
</nav>
  <div class="jumbotron" >
    <div id="headp">


  <h1>Book Your Ride</h1>
  <p>Find out more deatils about your ride and book before its too late..</p>
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

if($_SESSION['uid']=="")
{
  header("Location:loginnow.php");
}

if(!empty($_GET))
{
  $_SESSION['sj_id'] = $_GET['jid'];
}
else
{
  header("Location:invalidpage.php");
}
$sql = 'SELECT * FROM journey where j_id='.$_SESSION["sj_id"];
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<div style='float:left;margin:0 0 40px 40px;'><blockquote><h1>Ride Summary</h1> ";
       echo "<table>
       <tr>
          <td style='color:teal;'>
              Starting Point&nbsp&nbsp&nbsp
          </td>
          <td>".
              $row['j_start']."
          </td>
        <tr>
          <td style='color:teal;'>
              Destination
          </td>
          <td>" .
              $row['j_finish']."
          </td>
        <tr>
          <td style='color:teal;'>
              Date
          </td>
          <td>" .
              $row['j_date']."
          </td>
        <tr>
          <td style='color:teal;'>
              Time
          </td>
          <td>" .
              $row['j_time']."
          </td>
        <tr>
          <td style='color:teal;'>".
             "Journey<br> Description
          </td>
          <td>" .
              $row["j_desc"]. "
          </td>
        <tr>
          <td style='color:teal;'>
              Seats left
          </td>
          <td>".
              $row["seats"]. "
          </td>
        <tr>
      </table>";
      //echo "<h1>".$row["u_name"]."</h1>";
    $u=$row["uid"];
    $v=$row["v_id"];
    $seats = $row['seats'];
echo "</blockquote></div>";

    }
} else {
    echo "0 results";
}

$sql = "SELECT * FROM users where oauth_uid=".$u;
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/

      echo "<div style='float:left;margin:0 0 40px 40px;'><blockquote><h1>"."Offered by"."</h1>"."<br> ";
//echo '<img src="uploads/karthik.jpg" width="300px" >';
  //  echo "<img src=>"
  echo '<img src="'.$row['picture'].'" width="200px" style="border-radius:7px" >';

      echo "<br><b>Name&nbsp&nbsp:&nbsp&nbsp".$row["first_name"]." ".$row["last_name"]."<br></b>";
      echo "<p>".$row["email"]."</p>";
      echo "<p><a href= '".$row["link"]."' class='btn btn-success'>Google+ profile</a><p>";

echo "</blockquote></div>";
    }
} else {
    echo "0 results";
}
$sql = "SELECT * FROM vehicle where v_id =".$v;
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1> "."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/

      echo "<div style='float:left;margin:0 0 40px 40px;'><blockquote><h1>"."Vehicle Description"."</h1> ";
      echo '<img src="uploads/'.$row['v_image_name'].'" width="300px" style="border-radius:7px" >';
    //echo '<img src="uploads/wallhaven-173882.jpg" width="300px" >';
 echo "<br>Model Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp".$row["v_model"]."<br>"."Registration Number&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp".$row["v_rno"]."<br>"."Number of seats left&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp".$row["v_seat"]."<br>"."Vehicle Description&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp".$row["v_desc"]."<br>";
// echo $row["v_image_name"];
 //echo "<img src='uploads/".$row["v_image_name"]."'/>";

echo "</blockquote></div>";
    }
}
$conn->close();
?>
<br>
<br />
<br />
<div style='clear:left;margin:0 0 40px 40px;'>
<form method="post" action="confirm_booking.php">
    <blockquote>
    <h3>No: of seats to reserve</h3>
    <h4><?php echo $seats." "; ?>seats left</h4>
    <input type="text" name ="rseats" id ="rseats"></input>
    <font color="red"><br><br><?php echo $_SESSION['Message'];?></font>
    </blockquote>
  <div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
      <button type="reset" class="btn btn-default">Cancel</button>
      <button type="submit" class="btn btn-success">Book!</button>
    </div>
  </div>
</form>
</div>
<!--  <div class="form-group">
<label for="inputEmail" class="col-lg-2 control-label">Enter the number of seats required</label>
<div class="col-lg-10">
<input type="number" name="bookeds" class="form-control" id="inputseat" placeholder="Number of Seats Required">
</div>
-->
</div>
<br />
<br />



<br>
<br />
<br />
</div>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
