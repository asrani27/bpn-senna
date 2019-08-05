

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions Service</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    <div id="floating-panel">
    <b>Mulai: </b>
    <input type="hidden" id="start">
    <input type="text" value="lokasi saya">
    {{-- <select id="start">
      @foreach ($berkas as $b)
      <option value="{{$b->lat}},{{$b->long}}">{{$b->nomor}} / {{$b->pemohon->nama}}</option>
      @endforeach
    </select> --}}
    <b>Tujuan: </b>
    <select id="end">
      @foreach ($berkas as $b)
      <option value="{{$b->lat}},{{$b->long}}">{{$b->nomor}} / {{$b->pemohon->nama}}</option>
      @endforeach
    </select>
    <a href="{{route('home')}}" class="btn btn-sm btn-danger">Kembali Ke Home</a>
                  
    </div>
    <div id="map"></div>
    <script>
      function initMap() {
        var directionsService = new google.maps.DirectionsService();
        var directionsRenderer = new google.maps.DirectionsRenderer();
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat: -3.798144,lng: 114.747211}
        });
        directionsRenderer.setMap(map);
        infoWindow = new google.maps.InfoWindow;

        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsRenderer);
        };
        document.getElementById('start').addEventListener('change', onChangeHandler);
        document.getElementById('end').addEventListener('change', onChangeHandler);

        if (navigator.geolocation) {

          // // get lat/lon of click
          // var clickLat = event.latLng.lat();
          // var clickLon = event.latLng.lng();

          // // show in input box

          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            document.getElementById("start").value = position.coords.latitude+','+position.coords.longitude;
            //  = ;
            // document.getElementById("long").value = position.coords.longitude;

            infoWindow.setPosition(pos);
            infoWindow.setContent('Lokasi Saya.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

      }

      function calculateAndDisplayRoute(directionsService, directionsRenderer) {
        directionsService.route(
            {
              origin: {query: document.getElementById('start').value},
              destination: {query: document.getElementById('end').value},
              travelMode: 'DRIVING'
            },
            function(response, status) {
              if (status === 'OK') {
                directionsRenderer.setDirections(response);
              } else {
                window.alert('Directions request failed due to ' + status);
              }
            });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA5r7K4yOYtenz85eB9rNIrNxLWKFBiHZE&callback=initMap">
    </script>
  </body>
</html>