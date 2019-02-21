<!DOCTYPE html >
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
    <title>From Info Windows to a Database: Saving User-Added Form Data</title>
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
   <?php include'nav2.php';?>
   
  
    <div id="map" height="460px" width="100%"></div>
    <div style="display:none"><div  id="form" >
      <table>
      <tr><td>Name:</td> <td><input type='text' id='name'/> </td> </tr>
      <tr><td>Address:</td> <td><input type='text' id='address'/> </td> </tr>
      
                 <tr><td></td><td><input type='button' value='Save' onclick='saveData()'/></td></tr>
      </table>
    </div></div>
   
    
	
	
    <script>
	
	
      var map;
      var marker;
      var infowindow;
      var messagewindow;

	  
	  
	  
	  
	  
      function initMap() {
        var cavite = {lat: 	14.2456, lng:120.8786};
        map = new google.maps.Map(document.getElementById('map'), {
          center: cavite,
          zoom: 10
        });

        infowindow = new google.maps.InfoWindow({
          content: document.getElementById('form')
        });

        messagewindow = new google.maps.InfoWindow({
          content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function(event) {
          marker = new google.maps.Marker({
            position: event.latLng,
			draggable: true,
            map: map
          });


          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });
        });
      }

      function saveData() {
		 if(confirm("Updated data Sucessfully") == true){
			  window.location.href = "admin.php"; 
		  } 
        var name = escape(document.getElementById('name').value);
        var address = escape(document.getElementById('address').value);
       
        var latlng = marker.getPosition();
        var url = 'xml.php?name=' + name + '&address=' + address +
                  '&lat=' + latlng.lat() + '&lng=' + latlng.lng();

        downloadUrl(url, function(data, responseCode) {

          if (responseCode == 200 && data.length <= 1) {
            infowindow.close();
            messagewindow.open(map, marker);
          }
        });
		
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

       

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing () {
      }

	  
	  
	  
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdXmNHg8Ph8HZBk2m21O7t4gVBr4KjjmM&callback=initMap">
    </script>
	</div>
  </body>
</html>