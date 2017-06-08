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
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
        width: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
      html,body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    /*  .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }*/

  /*   #origin-input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
      /*  padding: 0 11px 0 13px;
        /*text-overflow: ellipsis;*/
      /*  width: 200px;
      }*/

    /*  #origin-input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }*/

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

    </style>


  <!--    <script>
    var autocomplete1,autocomplete2;
    function initMap() {
        autocomplete1 = new google.maps.places.Autocomplete((document.getElementById('start')));
        autocomplete2 = new google.maps.places.Autocomplete((document.getElementById('finish')));
        places = new google.maps.places.PlacesService(map);
        autocomplete.addListener('place_changed', onPlaceChanged);
      }

      function onPlaceChanged() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          document.getElementById('start').placeholder = 'Enter a city';
          document.getElementById('finish').placeholder = 'Enter a city';
        }
      }


	  	  function validateForm()
{
var a=document.forms["regg"]["start"].value;
var b=document.forms["regg"]["finish"].value;
var c=document.forms["regg"]["date"].value;
var d=document.forms["regg"]["time"].value;
var e=document.forms["regg"]["fare"].value;

if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e==""))
  {
  alert("All Field must be filled out");
  return false;
  }
	if (a==null || a=="")
  {
  alert("Starting point must be filled out");
  return false;
  }
if (b==null || b=="")
  {
  alert("Destinaton must be filled out");
  return false;
  }

  if (c==null || c=="")
  {
  alert("Date must be filled out");
  return false;
  }

  if (d==null || d=="")
  {
  alert("Time must be filled out");
  return false;
  }
  if (e==null || e=="")
  {
  alert("Fare must be filled out");
  return false;
  }
}



    </script>-->
  </head>
  <?php
session_start();
$_SESSION['lselect']="main";
$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password,"carpooldb");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
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

  -->  <ul class="nav navbar-nav navbar-right">
  <li><a href="home_join_ride.php" data-vivaldi-spatnav-clickable="1">Find a Ride</a></li>
  </ul>
  <ul class="nav navbar-nav navbar-right">
      <li><a href=<?php if($_SESSION['uid']=="") echo 'index.php'; else echo 'profile.php';?> data-vivaldi-spatnav-clickable="1"><?php if($_SESSION['uid']=="") echo 'Login'; else echo 'You';?></a></li>
    </ul>
  </div>
  </div>
  </nav>
  <body>

    <div class="jumbotron">
<div id="headp">


      <h1>Offer a Ride</h1>
      <p>Share empty seats of your ride!</p>

  </div>
  </div>

<?php
if($_SESSION['uid']==null)
{
  echo "Please <a href='index.php'>Login</a> first<!--";
}
?>
  <div id="map" style="width:30%;min-width:250px;float:left;margin-top:8vh;margin-left:5%;border-radius: 2%;"></div>


<div class="container" style="float:left;width:62%;margin-left:2%;">


    <h1>Enter the Journey Details</h1>


    <form class="form-horizontal" name="regg" onsubmit="return validateForm()" form method="post" action="insert_journey.php">
  <fieldset>


    <div class="form-group">
      <div class="col-lg-10">
        <input type="text" name="start" class="form-control" id="start" placeholder="starting location" >
      </div>

    </div>

    <div class="form-group">
      <div class="col-lg-10">
        <input type="text" name="finish" class="form-control" id="finish" placeholder="destination">
      </div>
     </div>

     <div class="form-group">
       <div class="col-lg-10">
         <input type="date" name="date" class="form-control" id="date" placeholder="date">
       </div>
      </div>
      <div class="form-group">
        <div class="col-lg-10">
          <input type="time" name="time" class="form-control" id="time" placeholder="time">
        </div>
       </div>

       <div class="form-group">
         <div class="col-lg-10">
           <input type="text" name="fare" class="form-control" id="fare" placeholder="fare" style="width:45%;float: left;">
         </div>
        </div>
       <div class="form-group">
         <div class="col-lg-10">
           <input type="text" name="seats" class="form-control" id="seats" placeholder="seats" style="width:45%;float: left;">
         </div>
        </div>
    <div class="form-group">
      <div class="col-lg-10">
        <textarea class="form-control" name="rdesc" rows="3" id="rdesc" placeholder="Add a description about your journey.."></textarea>

      </div>
    </div>
<!--    <div class="form-group">
      <label class="col-lg-2 control-label">Radios</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Option one is this
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Option two can be something else
          </label>
        </div>
      </div>
    </div>
-->
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" onsubmit="validateForm()" class="btn btn-success">Go to Next Step</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
    <?php
    if($_SESSION['uid']=='')
      echo '<!--';
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
  <script>
    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        mapTypeControl: false,
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13
      });

      new AutocompleteDirectionsHandler(map);
    }

     /**
      * @constructor
     */
    function AutocompleteDirectionsHandler(map) {
      this.map = map;
      this.originPlaceId = null;
      this.destinationPlaceId = null;
      this.travelMode = 'WALKING';
      var originInput = document.getElementById('start');
      var destinationInput = document.getElementById('finish');
  //    var modeSelector = document.getElementById('mode-selector');
      this.directionsService = new google.maps.DirectionsService;
      this.directionsDisplay = new google.maps.DirectionsRenderer;
      this.directionsDisplay.setMap(map);

      var originAutocomplete = new google.maps.places.Autocomplete(
          originInput, {placeIdOnly: true});
      var destinationAutocomplete = new google.maps.places.Autocomplete(
          destinationInput, {placeIdOnly: true});

  /*    this.setupClickListener('changemode-walking', 'WALKING');
      this.setupClickListener('changemode-transit', 'TRANSIT');
      this.setupClickListener('changemode-driving', 'DRIVING');*/

      this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
      this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

    //  this.map.controls[google.maps.ControlPosition.TOP_RIGHT].push(originInput);
    //  this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
      //this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
    }

    // Sets a listener on a radio button to change the filter type on Places
    // Autocomplete.
    AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
      //var radioButton = document.getElementById(id);
      var me = this;
    /*  radioButton.addEventListener('click', function() {
        me.travelMode = mode;
        me.route();
      });*/
    };

    AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
      var me = this;
      autocomplete.bindTo('bounds', this.map);
      autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.place_id) {
          window.alert("Please select an option from the dropdown list.");
          return;
        }
        if (mode === 'ORIG') {
          me.originPlaceId = place.place_id;
        } else {
          me.destinationPlaceId = place.place_id;
        }
        me.route();
      });

    };

    AutocompleteDirectionsHandler.prototype.route = function() {
      if (!this.originPlaceId || !this.destinationPlaceId) {
        return;
      }
      var me = this;

      this.directionsService.route({
        origin: {'placeId': this.originPlaceId},
        destination: {'placeId': this.destinationPlaceId},
        travelMode: this.travelMode
      }, function(response, status) {
        if (status === 'OK') {
          me.directionsDisplay.setDirections(response);
        } else {
          window.alert('Directions request failed due to ' + status);
        }
      });
    };

  </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nIT6Wk5vDG1Vy_knJ_E-LGcFzJIPfO4&libraries=places&callback=initMap"
      async defer></script>

</html>
