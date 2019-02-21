<?php
	session_start();
	
	include ('dbconn.php');
	
	$comment = nl2br(addslashes($_POST['comment']));
	
	$tid = $_GET['tid'];
	
	$insert = mysqli_query($con, "INSERT INTO replies (`topic_id`, `author`, `comment`, `date_posted`)
								  VALUES ('".$tid."', '".$_SESSION['username']."', '".$comment."', NOW());");
								  
	if ($insert) {
		header("Location: readtopic.php?tid=".$tid."");
	}
?>