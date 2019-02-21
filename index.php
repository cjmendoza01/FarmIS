
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<link href="styles/main.css" type="text/css" rel="stylesheet" />
	 <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
		
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
		  height: 100%;
        margin: auto;
		width: 1000px;
        padding: 0;
      
      }
    </style>
  
</head>

<body>
<div class="pane">
    <?php include'nav.php';?>
	</div>

   

    <div id="map">

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(14.2456, 120.8786),
          zoom: 10
        });
        var infoWindow = new google.maps.InfoWindow;

          downloadUrl('xml1.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
               var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdXmNHg8Ph8HZBk2m21O7t4gVBr4KjjmM&callback=initMap">
    </script>
	</div>
	<div class="pane">
	<img src="home\Untitled.png" class="center"><br>
	<img src="home\Untitled3.png"class="center"><br>
	<img src="home\Untitled1.png"class="center">
	</div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	
	<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
	</div>
</body>

</html>