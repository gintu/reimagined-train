<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Journey Deatils</title>

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

    <?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $_SESSION['Message']="";
  $_SESSION['lselect']="login";
  if($_SESSION['uid']==null)
  {
    $var = "Login";
  }
  else
  {
    $var = "You";
  }
  // Create connection
  $conn = mysqli_connect($servername, $username, $password,"carpooldb");
?>
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
  <?php 
  if($_SESSION['uid']!="")
    echo '<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" data-vivaldi-spatnav-clickable="1" style="color: yellow">Logout</a></li>
  </ul>';
  ?>

<ul class="nav navbar-nav navbar-right">
    <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer a Ride</a></li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=<?php if($var=='You') echo 'profile.php'; else echo 'index.php'?> data-vivaldi-spatnav-clickable="1"><?php echo $var;?></a></li>
      </ul>
    </div>
  </div>
</nav>

    <div class="jumbotron">
      <div id="headp">

      <h1>Select a ride</h1>
      <p>then pack your luggages</p>

  </div>
  </div>
  <div class='container' style='margin-left:10%;margin-right:10%;'>
  <table class="table table-striped table-hover ">
<?php
  
  // Check connection
  if (!$conn)
      die("Connection failed: " . mysqli_connect_error());
      $sqli = 'select * from journey,users where sel=1 and j_start like "%'. $_POST["j_start"].'%" and journey.uid = users.oauth_uid and j_finish like "%'. $_POST["j_finish"].'%" and j_date="'. $_POST["j_date"].'" order by j_fare ';
      $abc = $conn->query($sqli);
      if($abc)
      {
        echo '
          <tr class="success">
              <th>Sl. No</th>          
              <th>User</th>
              <th>Fare</th>
              <th>Description</th>
              <th>Seats left</th>
              <th></th>
          </tr>';
            $_SESSION['lselect']="book";
          $cnt = 1;
      while( $row = $abc->fetch_assoc()) {
            $query1= 'select * from users where oauth_uid='.$row["uid"];
            $result1 = mysqli_query($conn,$query1);
            $row1 = $result1->fetch_assoc();      
            echo "<tr><td> ". $cnt++."<td>". $row1['last_name']. " ".$row1['first_name']."</td><td> ". $row['j_fare']. "</td><td> ". $row['j_desc']. "</td><td> ". $row['seats']. "</td><td><a href = 'book.php?jid=".$row['j_id']."'><button class= 'btn btn-success'>Go</button></a></td></tr><br/>";
         }
      }
      else
        {
        echo "<br/><blockquote><h4 class='text-success'>&lt/&gt &nbsp&nbspThere's nothing here... <h4></blockquote> ";
      }
?>
</table>
</div>
<center>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCSxUkLnOe4B5WwYeJPugVNTYssGcdzWmY &libraries=places&callback=initMap"
        async defer></script>

</html>
