<!DOCTYPE html>
<html lang="en">
  <head>
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

    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Vehicle Deatils</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet"  />
<script type='text/javascript'>
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

    <div class="jumbotron">
<div id="headp">


      <h1>Offer a Ride</h1>
      <p>Share empty seats of your ride!</p>

  </div>
  </div>
<div class="container" style='margin-left:10%;margin-right:10%;'>


    <h1>Enter the Vehicle Details</h1>
    <br/>

    <form class="form-horizontal" form method="post" action="insert_vehicle.php" enctype="multipart/form-data">
  <fieldset>


    <div class="form-group">
      <div class="col-lg-10" id="autocomplete" >
        <input type="text" name="mname" class="form-control" id="mname" placeholder="Model Name" >
      </div>

    </div>

    <div class="form-group">
      <div class="col-lg-10">
        <input type="text" name="rno" class="form-control" id="rno" placeholder="Registraion Number" >
      </div>
     </div>

     <div class="form-group">
       <div class="col-lg-10">
         <input type="number" name="nos" class="form-control" id="nos" placeholder="Number of seats" >
       </div>
      </div>

  <!--   <div class="form-group">
       <label for="date" class="col-lg-2 control-label">Date</label>
       <div class="col-lg-10">
         <input type="text" class="form-control" id="date" placeholder="date">
       </div>
      </div>
      <div class="form-group">
        <label for="time" class="col-lg-2 control-label">Time</label>
        <div class="col-lg-10">
          <input type="text" class="form-control" id="time" placeholder="time">
        </div>
       </div>

       <div class="form-group">
         <label for="fare" class="col-lg-2 control-label">Fare</label>
         <div class="col-lg-10">
           <input type="text" class="form-control" id="fare" placeholder="fare">
         </div>
       </div> -->
    <div class="form-group">
      <div class="col-lg-10">
        <textarea name="vdesc" class="form-control" rows="3" id="rdesc" placeholder="Short Description about the vehicle.."  ></textarea>
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
  <div class="col-lg-10">
    <!--<input type="file" name="myimage" class="form-control" id="nos" >-->
    <input type="file" accept="image/*" onchange="preview_image(event)" name="myimage" class="form-control" id="nos" >
    <div id="wrapper">
      <br>
      <br>
    <img id="output_image"/>
    </div>
  </div>
 </div>

    <div class="form-group" >
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default" >Cancel</button>
        <button type="submit" class="btn btn-primary" >Submit</button>
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
</html>
