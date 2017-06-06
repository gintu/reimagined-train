<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Confirmation Page</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet"  />
    <LINK REL="icon" HREF="favicon.ico">

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
  <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" data-vivaldi-spatnav-clickable="1" style="color: yellow">Logout</a></li>
  </ul>
</div>
<!--
 <ul class="nav navbar-nav">
    <li class="active"><a href="#" data-vivaldi-spatnav-clickable="1">Link <span class="sr-only">(current)</span></a></li>
    <li><a href="#" data-vivaldi-spatnav-clickable="1">Link</a></li>

    </ul>


    <ul class="nav navbar-nav navbar-right">
    <li><a href="profile.php" data-vivaldi-spatnav-clickable="1">View Your Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer a Ride</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li><a href="home_join_ride.php" data-vivaldi-spatnav-clickable="1">Find a Ride</a></li>
    </ul>
  </div> -->
    </div>
    </nav>
    <div class="jumbotron">
    <div id="headp">
    <h1>Booking Confirmed</h1>
    <p>You are good to go.</p>
    </div>
    </div>

    <div class="container">
      <h1>Here are the contact details of person offers you ride</h1>
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


      //$jid=$_POST['j_id'];


      $sql = "SELECT * FROM users where oauth_uid=".$_SESSION['uid'];
      $result = $conn->query($sql);
      if ($result) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            /*  echo "<h1>"."name "."</h1>" . $row["u_name"]. "- email " . $row["email"]. " " . $row["bdate"]. "<br>";*/

          //  echo "<h1>"."Offered by"."</h1>"."<br>";
      echo "<blockquote> ";
      //echo '<img src="uploads/'.$row['u_image_name'].'" width="300px" >';

            echo "<br>Name:".$row["first_name"]." ".$row["last_name"]."<br>"."Gender:".$row["gender"]."<br>"."Bio:".$row["bio"]."<br>email:".$row["email"]."<br>Phone Number:".$row["pno"]."</br><a href = ".$row['link'].">GooglePlus</a> " ;

      echo "</blockquote>";
          }
      } else {
          echo "0 results";
      }

      $conn->close();
      ?>
      <a href="home_join_ride.php" class="btn btn-success" data-vivaldi-spatnav-clickable="1">Continue</a>

    </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
