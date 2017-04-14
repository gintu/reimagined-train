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
      <script>
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

    </script>
  </head>

  <body>

    <div class="jumbotron">
<div id="headp">


      <h1>Offer a Ride</h1>
      <p>Share empty seats of your ride!</p>

  </div>
  </div>
<div class="container">


    <h1>Enter the Journey Details</h1>
    <br>
    <br>

    <form class="form-horizontal" form method="post" action="insert_journey.php">
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
           <input type="text" name="fare" class="form-control" id="fare" placeholder="fare">
         </div>
        </div>
    <div class="form-group">
      <div class="col-lg-10">
        <textarea class="form-control" name="rdesc" rows="3" id="rdesc"></textarea>

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
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
    </div>
  </fieldset>
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
