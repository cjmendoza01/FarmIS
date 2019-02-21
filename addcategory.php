<?php 
		include 'dbconn.php';
if(isset($_GET['category_title'])){
	$category_title = $_GET['category_title'];
	
	
	
	$update = "INSERT INTO categories (category_title) VALUES ('$category_title')";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: forum.php");
	}


} 
