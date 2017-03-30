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
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>

    <div class="jumbotron">
      <div id="headp">

      <h1>Select a ride</h1>
      <p>then pack your luggages</p>

  </div>
  </div>
  <div class='container' style='margin-left:10%;margin-right:10%;'>
  <form method = 'post' action = 'book.php'>
  <table class="table table-striped table-hover ">
  <?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password,"carpooldb");

  // Check connection
  if (!$conn)
      die("Connection failed: " . mysqli_connect_error());
      $sqli = 'select * from journey where j_start = "'. $_POST["j_start"].'"';//'.'"journey.u_id = user.u_id and journey.v_id = vehicle.v_id and j_finish ="'. $_POST["j_end"].'" and j_date="'. $_POST["j_date"].'"';
      $abc = mysqli_query($conn,$sqli);
      if(!$abc)
      {
        echo "<br/><blockquote><h4 class='text-success'>&lt/&gt &nbsp&nbspThere's nothing here... <h4></blockquote> ";
      }
      else
      {
        echo '
          <tr>
              <th>User</th>
              <th>Fare</th>
              <th>Description</th>
              <th></th>
          </tr>
';
      while( $row = mysqli_fetch_array($abc) ) {
            $_SESSION['j_id'] = $row['j_fare'];
            echo '<a><tr><td> '. $row['u_id']. '</td><td> '. $row['j_fare']. '</td><td> '. $row['j_desc']. '<td><button class= "btn btn-success" type="submit">Go</button></td></tr><br/>';
         }
      }
?>
</table>
</form>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCSxUkLnOe4B5WwYeJPugVNTYssGcdzWmY &libraries=places&callback=initMap"
        async defer></script>

</html>
