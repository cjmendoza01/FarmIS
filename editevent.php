<?php

include 'content_function.php';
include ('dbconn.php');
if(isset($_GET['seminar_id'])){
	$sql = "SELECT * FROM seminars WHERE id =" .$_GET['seminar_id'];
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
}
?>

<!doctype html>

<html>
   <?php include'head.php';?>

<body>
<div class="pane">
  

<div class="content">
<form method="post">
<table class="tableheader">

	<tr><td> Title:</td>
	<td><input type="text" name="title" placeholder="Title" value="<?php echo $row['title']; ?>"><br/></td>
	</tr>
	<tr><td>Description:</td>
	<td><input type="text" name="description" placeholder="Description" value="<?php echo $row['description']; ?>"><br/></td>
	</tr>
	
	<tr><td><button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button></td>
	</tr>



<?php editevent($_GET['seminar_id']);?>
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