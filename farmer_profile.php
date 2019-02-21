<?php

include 'content_function.php';
include ('dbconn.php');

if(isset($_GET['id'])){
	$sql = "SELECT * FROM coffee_farmers WHERE id =" .$_GET['id'];
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$x=$row['name_of_farmer'];
$select=mysqli_query($con,"SELECT * FROM markers WHERE type='$x'");
$rw=mysqli_fetch_assoc($select);
$rw1=$rw['lat'];
if (isset($rw1)){
$lat=$rw['lat'];
$lng=$rw['lng'];
$zoom=14;
}
else{
$lat=14.2456;
$lng=120.8786;
$zoom=10;
}

}
?>

<!doctype html>

<html>
   <?php include'head.php';?>

<body>

<div class="pane">
  <?php include'nav.php';?>

<div id="map"></div>
    <script>
      function initMap() {
        var uluru = {lat:<?php echo $lat; ?>, lng: <?php echo $lng; ?>};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: <?php echo $zoom; ?>,
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
<h1><?php echo $row['location']; ?> </h1>
<h3><?php echo $row['farm_location']; ?> </h3>
<form >
<table class="tableheader">

	<tr><td>Name:</td>
	<td><input type="text" name="name_of_farmer" placeholder="Name" value="<?php echo $row['name_of_farmer']; ?>" disabled><br/></td>
	</tr>
	<tr><td>Farm Location:</td>
	<td><input type="text" name="farm_location" placeholder="Farm Location" value="<?php echo $row['farm_location']; ?>" disabled><br/></td>
	</tr>
	<tr><td>Area:</td>
	<td><input type="text" name="area" placeholder="Area" value="<?php echo $row['area']; ?>" disabled><br/></td>
	</tr>
	<tr><td>No. Of Trees:</td>
	<td><input type="text" name="no_of_trees" placeholder="No. Of Trees" value="<?php echo $row['no_of_trees']; ?>"disabled><br/></td>
	</tr>
	<tr><td>Location(ha):</td>
	<td><input type="text" name="location" placeholder="Location" value="<?php echo $row['location']; ?>" disabled><br/></td>
	<tr><td>Contact#:</td>
	<td><input type="text" name="contact" placeholder="Contact" value="<?php echo $row['contact']; ?>" disabled><br/></td>
	</tr>
	<tr><td>Email:</td>
	<td><input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>" disabled><br/></td>
	</table>
</form>
<?php
if(isset($_GET['id2'])){
$a=$_GET['id2'];
}



?>

<div class="content">
		<a href="feedback.php">send feedback</a>
		
		</div>
</body>
</html>