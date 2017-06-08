<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ride details</title>

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
    <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer a Ride</a></li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home_join_ride.php" data-vivaldi-spatnav-clickable="1">Find a Ride</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php" data-vivaldi-spatnav-clickable="1">You</a></li>
      </ul>

    </div>
  </div>
</nav>
    <div class="jumbotron" >
      <div id="headp">


  <h1>Ride#<?php echo $_GET['count'];?></h1>
  <p>Here are all your Details</p>
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

$dj_id=$_GET['dj_id'];
//echo $_SESSION['uid'];
$sql = "SELECT * FROM journey where j_id=".$dj_id;
$result = $conn->query($sql);
$count=0;
        echo "
                <br><br>
                <div>
                  <h1>Ride details</h1>
                  <p></p>
                </div>";
        // output data of each row
    while($row = $result->fetch_assoc()) {

      /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/
      echo "<div style='float:left;margin: 0 0 50px 50px;'><blockquote>";
      echo "<p>".$row["j_start"]."</p>";
      echo "<p>".$row["j_finish"]."<p>";
      echo "<p>".$row["j_date"]."<p>";
      echo "<p>".$row["j_time"]."<p>";
      echo "<p style='color:yellow;'> Seats Left :".$row["seats"]."<p>";
      echo "<form method='post' action='dropride.php?dj_id=".$dj_id."'><button type='submit' class='btn btn-warning'>Drop this ride</a></blockquote></div></form><br>";
    $v_id = $row['v_id'];
//  header('Content-type: image/jpg');
      // echo $content;
//      echo '<img src="data:image/jpeg;base64,'.base64_encode($content->load()) .'" />';

 //echo "< img src = ".$image_content." width=200 height=200 >";
 

}
$sql = "SELECT * FROM vehicle where v_id =".$v_id;
$result = $conn->query($sql);
if ($result) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      /*  echo "<h1> "."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/

      echo "<div style='float:left;margin-left:10%;'><h1>"."Vehicle Description"."</h1><blockquote> ";
    //  echo '<img src="uploads/'.$row['v_image_name'].'" width="300px" >';
    //echo '<img src="uploads/wallhaven-173882.jpg" width="300px" >';
 echo "<br>Model Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp".$row["v_model"]."<br>"."Registration Number&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp".$row["v_rno"]."<br>"."Number of seats left&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp".$row["v_seat"]."<br>"."Vehicle Description&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:&nbsp&nbsp".$row["v_desc"]."<br></div>";
// echo $row["v_image_name"];
 //echo "<img src='uploads/".$row["v_image_name"]."'/>";
echo "<img src='uploads/".$row['v_image_name']."' style='width:15%;margin-top:5%;margin-left:3%;'>";

    }
}

echo '<div style="clear:left;"><table class="table table-striped table-hover ">';
      $sqli = 'select first_name,bio,booked.seats as seats from booked,journey,users where journey.j_id = '.$dj_id.' and booked.jid=journey.j_id and users.oauth_uid = booked.uid';
      $abc = $conn->query($sqli);
          $cnt = 1;
      while( $row = $abc->fetch_assoc()) {
      if($cnt==1)
      {
        echo '
          <tr><br><h2>Booked users<h2>
              <th>Sl. No</th>          
              <th>Name</th>
              <th>Bio</th>
              <th>Seats booked</th>
              <th></th>
          </tr>';
      }

            echo "<tr><td> ". $cnt++."<td> ". $row['first_name']. "</td><td> ". $row['bio']. "</td><td> ". $row['seats']. "</td></tr><br/>";
         }
?>
</div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
