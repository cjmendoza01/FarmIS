<?php

include 'content_function.php';
include ('dbconn.php');
if(isset($_GET['id'])){
	$sql = "SELECT * FROM coffee_farmers WHERE id =" .$_GET['id'];
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
}
?>

<!doctype html>

<html>
 <?php include'head.php';?>
<body>
<div class="pane">
    <?php include'nav2.php';?>
<div class="content">
<form method="post">
<table class="tableheader">
<a href="admin.php">back</a
	<tr><td>Name:</td>
	<td><input type="text" name="name_of_farmer" placeholder="Name" value="<?php echo $row['name_of_farmer']; ?>"><br/></td>
	</tr>
	<tr><td>BRGY:</td>
	<td><input type="text" name="farm_location" placeholder="Farm Location" value="<?php echo $row['farm_location']; ?>"><br/></td>
	</tr>
	<tr><td>Area:</td>
	<td><input type="text" name="area" placeholder="Area" value="<?php echo $row['area']; ?>"><br/></td>
	</tr>
	<tr><td>No. Of Trees:</td>
	<td><input type="text" name="no_of_trees" placeholder="No. Of Trees" value="<?php echo $row['no_of_trees']; ?>"><br/></td>
	</tr>
	<tr><td>Town/Municipality:</td>
	<td><input type="text" name="location" placeholder="Location" value="<?php echo $row['location']; ?>"><br/></td>
	</tr>
	<tr><td>Contact Number:</td>
	<td><input type="text" name="contact" placeholder="Contact " value="<?php echo $row['contact']; ?>"><br/></td>
	</tr>
	<tr><td>Email:</td>
	<td><input type="text" name="email" placeholder="Email" value="<?php echo $row['email']; ?>"><br/></td>
	</tr>
	<tr><td><button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button></td>
	</tr>



<?php update($_GET['id']);?>
</table>
</form>

<script>
function update(){
	var x;
	if(confirm("Updated data Sucessfully") == true){
		x= "update";
	}
}
</script>
</div>
<div class="content">
		<a href="feedback.php">send feedback</a>
		
		</div>
</body>
</html>