<?php

include 'content_function.php';

?>

<!doctype html>
<html>
  <?php include'head.php';?>
<body>
<div class="pane">
  
<div class="content">
<form method="post">
<a href="admin.php"><--Goback</a>
<table class="tableheader">

	<tr><td>Name:</td>
	<td><input type="text" name="name_of_farmer" placeholder="Name" required ><br/></td>
	</tr>
	<tr><td>Barangay:</td>
	<td><input type="text" name="farm_location" placeholder="Barangay"required ><br/></td>
	</tr>
	<tr><td>Area:</td>
	<td><input type="text" name="area" placeholder="Area"><br/></td>
	</tr>
	<tr><td>No. Of Trees:</td>
	<td><input type="text" name="no_of_trees" placeholder="No. Of Trees"><br/></td>
	</tr>
	<tr><td>Town/Municipality:</td>
	<td><input type="text" name="location" placeholder="Town "><br/></td>
	</tr>
	<tr><td>Contact Number:</td>
	<td><input type="text" name="contact" placeholder="Contact "><br/></td>
	</tr>
	
	<tr><td>Email:</td>
	<td><input type="text" name="email" placeholder="Email "><br/></td>
	</tr>
	
	</tr>



<?php addfarmer();?>
</table>
	<button type="submit" name="btn-send" id="btn-send" onClick="update()"><strong>Add</strong></button>

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
</body>
</html>