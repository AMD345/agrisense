<!-- ITO YUNG PARA SA INPUT PAGE. YUGN LOCATION IS MAG SESELECT KA LANG SA MAPS. THEN I SASAVE MO YUNG LONGITUDE THAPOS LATIDUE SA DATABASE KASAMA NG IBANG INPUTS.  -->

<style>
  body {
    font-family: Arial;
  }

  #map-layer {
    margin: 20px 0px;
    max-width: 600px;
    min-height: 400;
  }

  #btnAction {
    background: #3878c7;
    padding: 10px 40px;
    border: #3672bb 1px solid;
    border-radius: 2px;
    color: #FFF;
    font-size: 0.9em;
    cursor: pointer;
    display: block;
  }

  #btnAction:disabled {
    background: #6c99d2;
  }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpnxeA77qzhKyYN8Jj1DXVAIOqZwuCcBM&callback=initMap" async defer></script>

<script type="text/javascript">
  var map;
  var geocoder;
  var marker; // Variable to store the marker
  var selectedLat;
  var selectedLng;

  function initMap() {
    var mapLayer = document.getElementById("map-layer");
    var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
    var defaultOptions = { center: centerCoordinates, zoom: 4 };

    map = new google.maps.Map(mapLayer, defaultOptions);
    geocoder = new google.maps.Geocoder();

    var infoWindow = new google.maps.InfoWindow();

    google.maps.event.addListener(map, 'click', function (event) {
      document.getElementById("lat").value = event.latLng.lat();
      document.getElementById("long").value = event.latLng.lng();

      var lat = parseFloat(document.getElementById("lat").value);
      var lng = parseFloat(document.getElementById("long").value);
      var latlng = new google.maps.LatLng(lat, lng);

      geocoder.geocode({ 'location': latlng }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
          if (results[0]) {
            document.getElementById("address").value = results[0].formatted_address;
            infoWindow.setContent(results[0].formatted_address);
            infoWindow.setPosition(latlng);
            infoWindow.open(map);
          }
        }
      });

      // Remove existing marker before adding a new one
      if (marker) {
        marker.setMap(null);
      }

      marker = addMarker(event.latLng, map);

      // Store selected latitude and longitude
      selectedLat = event.latLng.lat();
      selectedLng = event.latLng.lng();
    });

    function addMarker(location, map) {
      return new google.maps.Marker({
        position: location,
        map: map,
      });
    }

    window.initMap = initMap;
  }

  function locate() {
    // Display the selected latitude and longitude in an alert
    alert("Selected Latitude: " + selectedLat + "\nSelected Longitude: " + selectedLng);
  }
</script>

<h1>How to Get Current Location using Google Map Javascript API</h1>
<div id="button-layer">
  <button id="btnAction" onClick="locate()">My Current Location</button>
</div>
<div id="map-layer"></div>

Latitude <input type="text" id="lat">
Longitude <input type="text" id="long">
