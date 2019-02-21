<?php

include 'content_function.php';
include ('dbconn.php');
if(isset($_GET['pdf_id'])){
	$sql = "SELECT * FROM file WHERE id =" .$_GET['pdf_id'];
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
  <A HREF ="admin.php">Back</a>
<form method="post">
<table class="tableheader">

	<tr><td> Title:</td>
	<td><input type="text" name="title" placeholder="Title" value="<?php echo $row['title']; ?>"><br/></td>
	</tr>
	
	<tr><td>Description:</td>

	<td><textarea rows="10" cols="35" name="description" ><?php echo $row['description']; ?></textarea><br/></td>
	</tr>
	
	<tr><td><button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button></td>
	</tr>



<?php editfile($_GET['pdf_id']);?>
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