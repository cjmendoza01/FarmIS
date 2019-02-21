<?php
	session_start();
	
	include ('dbconn.php');
	
	$topic = addslashes($_POST['topic']);
	if(isset($topic)){
	echo $topic;}
	$content = nl2br(addslashes($_POST['content']));
	if(isset($_SESSION['username'])){
	echo $topic;}
if(isset($content)){
	echo $topic;}
	$insert = mysqli_query($con, "INSERT INTO `forumrequest` (`author`, `title`, `content`, `date_posted`) 
								  VALUES ('".$_SESSION['username']."', '".$topic."', '".$content."', NOW())");
								  
	if ($insert) {
		header("Location: topics.php");
	}else {
	echo "error";}
?>