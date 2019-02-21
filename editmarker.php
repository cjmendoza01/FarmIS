<?php

include 'content_function.php';
include ('dbconn.php');
if(isset($_GET['id'])){
	$sql = "SELECT * FROM markers WHERE id =" .$_GET['id'];
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
}
?>

<!doctype html>

<html>
 <?php include'head.php';
 ?>

<body>
<div class="pane">
  

<?php include ('nav2.php'); ?>
<div class="content">
<form method="post">
<a href="admin.php">Back</a>
<table class="tableheader">

	<tr><td>Name:</td>
	<td><input type="text" name="name" placeholder="Name" value="<?php echo $row['type']; ?>"><br/></td>
	</tr>
	<tr><td>Address:</td>
	<td><input type="text" name="address" placeholder="Address" value="<?php echo $row['address']; ?>"><br/></td>
	</tr>
	<tr><td>Latitude:</td>
	<td><input type="text" name="lat" placeholder="Latitude" value="<?php echo $row['lat']; ?>"><br/></td>
	</tr>
	<tr><td>Longitude:</td>
	<td><input type="text" name="lng" placeholder="Longitude" value="<?php echo $row['lng']; ?>"><br/></td>
	</tr>
	<tr><td><button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button></td>
	</tr>



<?php editmarker($_GET['id']);?>
</table>
</form>

<script>
function update(){

	if(confirm("Updated data Sucessfully") == true){
		
	}
}
</script>
</div>

</body>
</html>