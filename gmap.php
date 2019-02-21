<!DOCTYPE html>
<html>
  <head>
   <title>Untitled</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<link href="styles/main.css" type="text/css" rel="stylesheet" />

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
 
    <style>
      #right-panel {
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }

      #right-panel select, #right-panel input {
        font-size: 15px;
      }

      #right-panel select {
        width: 100%;
      }

      #right-panel i {
        font-size: 12px;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height:100%;
        float: left;
        width: 100%;
        height: 50%;
      }
      #right-panel {
        float: left;
        width: 15%;
        height: 100%;
      }
      .panel {
        height: 100%;
        overflow: auto;
      }
    </style>
  </head>
  <body>
  <div class="pane"style="height:100%">
  
  <?php include'nav.php';?>

 <div class="content">
  <form method="POST" action="gmap.php">
  <input type="Text" name="search2" id="search" placeholder="Search for Directions"/>&ensp;
 <input type="submit" name="search" value="Search">
  
  </form>
  </div>
 
  <br>
   
  <?php
include('dbconn.php');
 
  if(isset($_POST['search'])){
	  $search=$_POST['search2'];
  $select=mysqli_query($con,"SELECT * FROM markers WHERE type LIKE '%".$search."%'");
  while($row=mysqli_fetch_assoc($select)){
  echo "<div class='content' ><a href='/forum/gmap.php?lat=".$row['lat']."&lng=".$row['lng']."'> ".$row['type']."</a></div></br>";
  
  }}
  
  
  ?>
  <?php
if (isset($_GET['lat'])){
$a=$_GET['lat'];
$b=$_GET['lng'];
}else{
$a=14.1978;
$b=120.8815;
}
?>
    <div id="map"></div>

    <div id="right-panel">
      <p>Total Distance: <span id="total"></span></p>
    </div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: {lat: 14.2456, lng: 120.8786}  
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
          draggable: false,
          map: map,
          panel: document.getElementById('right-panel')
        });

        directionsDisplay.addListener('directions_changed', function() {
          computeTotalDistance(directionsDisplay.getDirections());
        });

        var uluru = {lat:14.1978, 
		lng: 120.8815 };
		var uluru2 = {lat: <?php echo $a; ?>, 
		lng: <?php echo $b; ?> };
        displayRoute(uluru, uluru2, directionsService,
            directionsDisplay);
      }

      function displayRoute(origin, destination, service, display) {	
        service.route({
          origin: origin,
          destination: destination,
       
          travelMode: 'DRIVING',
          avoidTolls: true
        }, function(response, status) {
          if (status === 'OK') {
            display.setDirections(response);
          } else {
            alert('Could not display directions due to: ' + status);
          }
        });
      }

      function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (var i = 0; i < myroute.legs.length; i++) {
          total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-PdppmNImpMq4S6oG6KKow18zoFXYLb8&callback=initMap">
    </script>
	
	</div>
	
		
  </body>
</html>