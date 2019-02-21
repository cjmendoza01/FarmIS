<?php
require('dbconn.php');
if (isset($_GET['id'])) {
$id=$_REQUEST['id'];
$query = "DELETE FROM coffee_farmers WHERE id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php?aid=2"); 
}
 if (isset($_GET['user_id'])) {
	$id=$_REQUEST['user_id'];
	$query = "DELETE FROM users WHERE user_id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php?aid=1"); 
	
}
 if (isset($_GET['marker_id'])) {
	$id=$_REQUEST['marker_id'];
	$query = "DELETE FROM markers WHERE id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php?aid=0"); 
	
}
 if (isset($_GET['seminar_id'])) {
	$id=$_REQUEST['seminar_id'];
	$query = "DELETE FROM seminars WHERE id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: admin.php?aid=3"); 
	
}
 if (isset($_GET['pdf_id'])) {
	$id=$_REQUEST['pdf_id'];
$select=mysqli_query($con,"SELECT * FROM file WHERE id='$id'");
$row=mysqli_fetch_assoc($select);
unlink($row['filepath']);
	$query = "DELETE FROM file WHERE id='$id'"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: admin.php?aid=4"); 
	
}
 if (isset($_GET['forum'])) {
	
	$id=$_REQUEST['forum'];
	$query = "DELETE FROM topics WHERE topic_id='$id'"; 
	
$result = mysqli_query($con,$query) or die ( mysqli_error());
$query2 = "DELETE FROM replies WHERE topic_id='$id'"; 
	
$result2 = mysqli_query($con,$query2) or die ( mysqli_error());
header("Location: admin.php?aid=8"); 
	
}
if (isset($_GET['request'])) {
	
	$id=$_REQUEST['request'];
	$query = "DELETE FROM forumrequest WHERE topic_id='$id'"; 
	
$result = mysqli_query($con,$query) or die ( mysqli_error());

header("Location: admin.php?aid=8"); 
	
}
if (isset($_GET['reply_id'])){
	$r=$_GET['reply_id'];
	$v=$_GET['vrid'];
	$query=mysqli_query($con,"Delete FROM replies WHERE reply_id=".$r."");
	if ($query){
	header("location:viewreplies.php?topic_id='$v'");}
}
?>