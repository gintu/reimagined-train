<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
    </style>
  </head>
  <body>
    <h3>My Google Maps Demo</h3>
    <div id="map" class="container"; ></div>
    <script>
    function initMap() {
      var uluru = {lat: -25.363, lng: 131.044};
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
      });
      var marker = new google.maps.Marker({
        position: uluru,
        map: map
      });
    }
  </script>
  <script async defer
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCq3DXxg7yAqEhaeu8fRNmDMBps91k_yXQ&callback=initMap">
  </script>
  </body>
</html>
