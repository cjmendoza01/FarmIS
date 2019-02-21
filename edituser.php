<?php

include 'content_function.php';
include ('dbconn.php');
if(isset($_GET['user_id'])){
	$sql = "SELECT * FROM users WHERE user_id =" .$_GET['user_id'];
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

	<tr><td> Username:</td>
	<td><input type="text" name="username" placeholder="Username" value="<?php echo $row['username']; ?>"><br/></td>
	</tr>
	<tr><td>Password:</td>
	<td><input type="text" name="password" placeholder="Password" value="<?php echo $row['password']; ?>"><br/></td>
	</tr>
	<tr><td>Name:</td>
	<td><input type="text" name="fname" placeholder="Name" value="<?php echo $row['fname']; ?>"><br/></td>
	</tr>
	<tr><td>Gender:</td>
	<td><input type="text" name="gender" placeholder="Gender" value="<?php echo $row['gender']; ?>"><br/></td>
	</tr>
	<tr><td>Contact Number:</td>
	<td><input type="text" name="contact_number" placeholder="Contact" value="<?php echo $row['contact_number']; ?>"><br/></td>
	</tr>
	<tr><td>Picture:</td>
	<td><input type="text" name="picture" placeholder="Picture" value="<?php echo $row['picture']; ?>"><br/></td>
	</tr>
	<tr><td><button type="submit" name="btn-update" id="btn-update" onClick="update()"><strong>Update</strong></button></td>
	</tr>



<?php edituser($_GET['user_id']);?>
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