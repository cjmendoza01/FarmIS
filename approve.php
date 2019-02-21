<?php
include ('dbconn.php');
$id=$_GET['id'];
 $select=mysqli_query($con,"Select * from forumrequest WHERE topic_id=".$id."");
$row=mysqli_fetch_assoc($select);
$topic=$row['title'];
$author=$row['author'];
$content=$row['content'];
$date=$row['date_posted'];

$insert = mysqli_query($con, "INSERT INTO `topics` (`author`, `title`, `content`, `date_posted`) 
								  VALUES ('".$author."', '".$topic."', '".$content."', '".$date."')");
								  $query = mysqli_query($con,"DELETE FROM forumrequest WHERE topic_id='$id'"); 
	if ($insert) {
		header("Location: admin.php?aid=8");
}
?>