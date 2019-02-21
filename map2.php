<?php
include ('dbconn.php');
$a=$_GET['loc'];

$select=mysqli_query($con,"SELECT * FROM markers WHERE type='$a'");
$row=mysqli_fetch_assoc($select);

?>
<html>
    <?php include'head.php';?>
  
<body>
<div class="pane">
    <?php include'nav.php';?>

  </head>

    <h1><?php echo $a;?></h1>
    <div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat:<?php echo $row['lat']; ?>, lng: <?php echo $row['lng']; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdXmNHg8Ph8HZBk2m21O7t4gVBr4KjjmM&callback=initMap">
    </script>
  
  <div class="content">
  <h3>Farmers:</h3></br>
  <?php
  $s=mysqli_query($con,"SELECT * FROM coffee_farmers WHERE farm_location='$a' ");
  while($row=mysqli_fetch_assoc($s)){
  echo "<a href='farmer_profile.php?id=".$row['id']."&id2=".$a."'>".$row['name_of_farmer']."</a></br>";
  
  }
  ?>
</div>


  <div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
</div>
		  </div>
  </body>
</html>