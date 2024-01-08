<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial;
    }

    #map-layer {
      margin: 20px 0px;
      max-width: 600px;
      min-height: 400px;
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpnxeA77qzhKyYN8Jj1DXVAIOqZwuCcBM&callback=initMap"
    async defer></script>
  <script type="text/javascript">
    var map;
    var geocoder;
    var markers = [];

    function initMap()
    {
      var mapLayer = document.getElementById("map-layer");
      var centerCoordinates = new google.maps.LatLng(37.6, -95.665);
      var defaultOptions = { center: centerCoordinates, zoom: 4 };

      map = new google.maps.Map(mapLayer, defaultOptions);
      geocoder = new google.maps.Geocoder();

      // Your array of locations (latitude and longitude pairs)
      var locations = [
        { lat: 37.7749, lng: -122.4194 },
        { lat: 15.7749, lng: 120.4194 },
        // Add 9 more pairs here...
      ];

      locations.forEach(function (location)
      {
        var latlng = new google.maps.LatLng(location.lat, location.lng);
        var marker = new google.maps.Marker({
          position: latlng,
          map: map
        });

        markers.push(marker);

        google.maps.event.addListener(marker, 'click', function ()
        {
          geocodeLatLng(latlng, function (address)
          {
            var infoWindow = new google.maps.InfoWindow({
              content: address
            });
            infoWindow.open(map, marker);
          });
        });
      });
    }

    function geocodeLatLng(latlng, callback)
    {
      geocoder.geocode({ 'location': latlng }, function (results, status)
      {
        if (status === google.maps.GeocoderStatus.OK)
        {
          if (results[0])
          {
            var address = results[0].formatted_address;
            callback(address);
          }
        }
      });
    }

    window.initMap = initMap;
  </script>
</head>

<body>
  <div id="map-layer"></div>
</body>

</html>