<?php
include ('dbconn.php');
$title=$_GET['title'];
$description=$_GET['description'];
$A=mysqli_query($con,"INSERT INTO seminars(Title,Description) VALUES ('".$title."','".$description."')");
if ($A){
	
	header("Location: admin.php?aid=3");
}



?>