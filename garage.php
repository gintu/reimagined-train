</html>
<!DOCTYPE html>
<html lang="en">
    <head>
      <script type"javascript">
  function myFunction() {
      alert("I am an alert box!");
  }
  </script>
    <script>
      var autocomplete;
      function initMap() {
          infoWindow = new google.maps.InfoWindow({
            content: document.getElementById('info-content')
          });
          autocomplete = new google.maps.places.Autocomplete((document.getElementById('autocomplete')));
          places = new google.maps.places.PlacesService(map);
          autocomplete.addListener('place_changed', onPlaceChanged);
        }

        function onPlaceChanged() {
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            document.getElementById('autocomplete').placeholder = 'Enter a city';
          }
        }

      function validateForm()
  {
  var a=document.forms["reg"]["mname"].value;
  var b=document.forms["reg"]["rno"].value;
  var c=document.forms["reg"]["nos"].value;

  if ((a==null || a=="") && (b==null || b=="") && (c==null || c==""))
    {
    alert("All Field must be filled out");
    return false;
    }
    if (a==null || a=="")
    {
    alert("Model name must be filled out");
    return false;
    }
  if (b==null || b=="")
    {
    alert("Registration number must be filled out");
    return false;
    }
  if (c==null || c=="")
    {
    alert("Number of seats must be filled out");
    return false;
    }
  }

      </script>


      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Vehicle Details</title>

      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet"  />
  <script type='text/javascript'>
  <link rel='icon' href='favicon.ico'>

  function preview_image(event)
  {
   var reader = new FileReader();
   reader.onload = function()
   {
    var output = document.getElementById('output_image');
    output.src = reader.result;
   }
   reader.readAsDataURL(event.target.files[0]);
  }
  </script>
  <style>
  .imgdiv
  {
    position:relative;
    height:30%;
    overflow:hidden;
    width:75%;
    border-radius:50%;
  }
  .imgd
  {
    left: -30%;
    height:100%;
    width: 140%;
  }
 

/* Shrink */
.hvr-shrink {
  display: inline-block;
  vertical-align: middle;
  -webkit-transform: perspective(1px) translateZ(0);
  transform: perspective(1px) translateZ(0);
  box-shadow: 0 0 1px transparent;
  -webkit-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-property: transform;
  transition-property: transform;
}
.hvr-shrink:hover, .hvr-shrink:focus, .hvr-shrink:active {
  -webkit-transform: scale(0.9);
  transform: scale(0.9);
}
  #wrapper
  {
   text-align:left;
   margin:0 auto;
   padding:0px;
   width:995px;
  }
  #output_image
  {
   max-width:300px;
  }
  </style>
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
    include_once 'accesscheck.php';
    $servername = "localhost";
    $username = "root";
    $password = "";
    $var = "You";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,"carpooldb");

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    if($_SESSION['uid']=="")
    {
    $var = "Login";
    }
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
<ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php" data-vivaldi-spatnav-clickable="1" style="color: yellow">Logout</a></li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer Ride</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="home_join_ride.php" data-vivaldi-spatnav-clickable="1">Find Ride</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=<?php if($var=='Login') echo 'index.php'; else echo 'profile.php';?> data-vivaldi-spatnav-clickable="1"><?php echo $var;?></a></li>
      </ul>
      </div>
    </div>
  </nav>


  <div class="jumbotron">
    <div id ="headp">
      <h1>Your Garage</h1>
      <p>Add or remove vehicles</p>
    </div>
  </div>
  <center>
    <?php
    if(!empty($_GET) && $_SESSION['flag']==0)
      echo '<div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Warning!</h4>
    <p>Cant delete vehicles which have rides ahead. <a href="profile.php" class="alert-link"> Remove rides </a> first.</p>
    </div>';
      $_SESSION['flag']=1;
    ?>
  </h3>
<div class="container">
      <?php
          $query = 'select * from vehicle where uid ='.$_SESSION['uid'];
          $result = $conn->query($query);
          $count=0;
          if ($result) {
          // output data of each row
            while($row = $result->fetch_assoc()) {
              $count++;
                echo "<div style='margin-right:7%;margin-bottom:5%;float:left;width:25%;min-width:250px;' class='hvr-shrink'>";
                echo "<center><h3> Ride #".$count."</h3><div class='imgdiv'>";
                echo "<img src = 'uploads/".$row['v_image_name']."' class='imgd'>";
                echo "</div><p><b><br>".$row["v_model"]."</b></p>";
                echo "<p>".$row["v_rno"]."</p>";
                echo "<p><i><div style='opacity:.5;style='max-height:15%;height:7%;'>".$row["v_desc"]."</div></i></p>";
                echo "<a class='btn btn-success' href=remove_vehicle.php?v_id='".$row['v_id']."'>Remove</a>";
                echo "</center></form></div>";
            }
          }
          ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
