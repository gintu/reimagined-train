<!DOCTYPE html>
<html lang="en">
  <head>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script>
  var autocomplete1,autocomplete2;
  function initMap() {
      autocomplete1 = new google.maps.places.Autocomplete((document.getElementById('StartLoc')));
      autocomplete2 = new google.maps.places.Autocomplete((document.getElementById('EndLoc')));
      places = new google.maps.places.PlacesService(map);
      autocomplete.addListener('place_changed', onPlaceChanged);
    }

    function onPlaceChanged() {
      var place = autocomplete.getPlace();
      if (!place.geometry) {
        document.getElementById('StartLoc').placeholder = 'Enter a city';
        document.getElementById('EndLoc').placeholder = 'Enter a city';
      }
    }

    </script>
    <script>
function validateForm() {
    var x = document.forms["myForm"]["j_start"].value;
    if (x == "") {
        alert("starting location must be filled out");
        return false;
    }
    var y = document.forms["myForm"]["j_finish"].value;
    if (y == "") {
        alert("finishing point must be filled out");
        return false;
    }
    var z = document.forms["myForm"]["j_date"].value;
    if (z == "") {
        alert("date must be filled out");
        return false;
    }
}
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Join a Ride</title>

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
      <a href="home_join_ride.php" class="navbar-brand" >#sharemyride</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
    <!--  <ul class="nav navbar-nav">
        <li class="active"><a href="#" data-vivaldi-spatnav-clickable="1">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#" data-vivaldi-spatnav-clickable="1">Link</a></li>

      </ul>

-->  <ul class="nav navbar-nav navbar-right">
    <li><a href="main.php" data-vivaldi-spatnav-clickable="1">Offer a Ride</a></li>
  </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php" data-vivaldi-spatnav-clickable="1">You</a></li>
      </ul>
    </div>
  </div>
</nav>
    <div class="jumbotron"  class="nomar">

<div id="headp">

      <h1>Join a Ride</h1>
      <p>Where do you wanna go?</p>

  </div>
  </div>
<div class="container">


  <form name="myform" class="form-horizontal" onsubmit="return validateForm()" method='post' action = 'select_ride.php'>
    <fieldset>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="text" class="form-control" name="j_start" id="StartLoc" placeholder="Leaving from..">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="text" class="form-control" name="j_finish" id="EndLoc" placeholder="Going to..">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="date" class="form-control" name="j_date" id="JDate" placeholder="Date">
        </div>
      </div>
        <button type="submit" class="btn btn-success" value="submit">Search</button>
    </fieldset>
  </form><br />
  <br/><br />
  <!--<a href="main.php" class="btn btn-link" data-vivaldi-spatnav-clickable="1">Offer a Ride</a>-->

  <!--<footer>
    <p class="text-success">Made with love in RIT</p>
  </footer>-->

  </div>
  <div style="height:50%;">

</div>
     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyCSxUkLnOe4B5WwYeJPugVNTYssGcdzWmY &libraries=places&callback=initMap"
        async defer></script>

  </body>
</html>
