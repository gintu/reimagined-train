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
    <div class="jumbotron">
<div id="headp">


      <h1>Join a Ride</h1>
      <p>Where do you wanna go?</p>

  </div>
  </div>
<div class="container">


  <form class="form-horizontal" method='post' action = 'select_ride.php'>
    <fieldset>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="text" class="form-control" name="j_start" id="StartLoc" placeholder="Leaving from.."">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="text" class="form-control" id="EndLoc" placeholder="Going to..">
        </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="date" class="form-control" id="JDate" placeholder="Date">
        </div>
      </div>
        <button type="submit" class="btn btn-success" >Submit</button>
    </fieldset>
  </form><br />
  <br/><br />
  <!--<a href="main.php" class="btn btn-link" data-vivaldi-spatnav-clickable="1">Offer a Ride</a>-->

  <footer>
    <p class="text-success">Made with love in RIT</p>
  </footer>

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
