<?php

	
	function disptopics() {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT * FROM topics ORDER BY date_posted DESC");
		if (mysqli_num_rows($select) != 0) {
			echo "<table class='topic-table'>";
			echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th></tr>";
			while ($row = mysqli_fetch_assoc($select)) {
				echo "<tr><td><a href='readtopic.php?tid=".$row['topic_id']."'>
					 ".$row['title']."</a></td><td>".$row['author']."</td><td>".$row['date_posted']."</td><td>".$row['views']."</td>
					 </tr>";
			}
			echo "</table>";
		} else {
			echo "<p>this category has no topics yet!  <a href='newtopic.php?cid=".$cid."&scid=".$scid."'>
				 add the very first topic like a boss!</a></p>";
		}
	}
	
	function disptopic($tid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT * FROM topics WHERE ($tid = topics.topic_id)");
		$row = mysqli_fetch_assoc($select);
		echo nl2br("<div class='content1'><h2 class='title'>".$row['title']."</h2><p>Posted by: ".$row['author']."\n Date Posted: ".$row['date_posted']."</p></div>");
		echo "<div class='content1'><p>Content: ".$row['content']."</p></div>";
	}
	
	function addview($tid) {
		include ('dbconn.php');
		$update = mysqli_query($con, "UPDATE topics SET views = views + 1 WHERE topic_id = ".$tid."");
	}
	
	function replylink($tid) {
		echo "<div class='content'><a href='replyto.php?tid=".$tid."'>Reply to this post</a></div>";
	}
	
	function replytopost($tid) {
		echo "<div class='content'><form action='addreply.php?tid=".$tid."' method='POST'>
			  <p>Comment: </p>
			  <textarea cols='80' rows='5' id='comment' name='comment'></textarea><br />
			  <input type='submit' value='add comment' />
			  </form></div><a href='readtopic.php?tid=".$tid."'>Return</a>";
	}
	
	function dispreplies($tid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT replies.author, comment, replies.date_posted FROM 
									  topics, replies WHERE($tid = replies.topic_id) AND ($tid = topics.topic_id) ORDER BY reply_id DESC");
		if (mysqli_num_rows($select) != 0) {
			echo "<div class='content2'><table class='reply-table'>";
			while ($row = mysqli_fetch_assoc($select)) {
				echo nl2br("<tr><th width='15%'>".$row['author']."</th><td>".$row['date_posted']."\n".$row['comment']."\n\n</td></tr>");
			}
			echo "</table></div>";
		}
	}
	
	function countReplies($tid) {
		include ('dbconn.php');
		$select = mysqli_query($con, "SELECT * FROM replies WHERE ".$tid." = topic_id");
		return mysqli_num_rows($select);
	}




	function update($id){
		include 'dbconn.php';
if(isset($_POST['btn-update'])){
	$name = $_POST['name_of_farmer'];
	$farmloc = $_POST['farm_location'];
	$area = $_POST['area'];
	$no_of_trees = $_POST['no_of_trees'];
	$location = $_POST['location'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	
	$update = "UPDATE coffee_farmers SET name_of_farmer='$name', farm_location='$farmloc', area='$area', no_of_trees='$no_of_trees', location='$location',
email='$email',contact='$contact'	WHERE id='$id'";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: admin.php");
	}

}
} 
function editmarker($id){
		include 'dbconn.php';
if(isset($_POST['btn-update'])){
	
	$address = $_POST['address'];
	$lat = $_POST['lat'];
	$lng = $_POST['lng'];
	$town = $_POST['type'];
	
	$update = "UPDATE markers SET  address='$address', lat='$lat', lng='$lng', type='$town' WHERE id='$id'";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: admin.php");
	}

}
} 

function edituser($id){
		include 'dbconn.php';
	if(isset($_POST['btn-update'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$name = $_POST['fname'];
	$contact_number = $_POST['contact_number'];
	$picture = $_POST['picture'];
	
	$update = "UPDATE users SET username='$username', password='$password', fname='$name', contact_number='$contact_number', picture='$picture' WHERE user_id='$id'";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: admin.php");
	}

}
} 
function editevent($id){
		include 'dbconn.php';
	if(isset($_POST['btn-update'])){
	$title = $_POST['title'];
	$description = $_POST['description'];
	
	
	$update = "UPDATE seminars SET title='$title', description='$description' WHERE id='$id'";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: admin.php");
	}

}
} 
function editfile($id){
		include 'dbconn.php';
	if(isset($_POST['btn-update'])){
	$title = $_POST['title'];
	
	$description = $_POST['description'];
	
	
	
	$update = "UPDATE file SET title='$title', description='$description'  WHERE id='$id'";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: admin.php");
	}

}
} 
function display(){
	
include 'dbconn.php';

$sql = "SELECT * FROM coffee_farmers";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("	
		<tr>
        <td> ".$row['id']." </td>
        <td> " .$row['name_of_farmer']." </td>
        <td>".$row['farm_location']." </td>
        <td> ".$row['area']."</td>
        <td> ".$row['no_of_trees']." </td>
        <td> ".$row['location']." </td>
        
      
        <td><a href='edit.php?id=".$row['id']." ' alt='edit' >View/Edit</a></td>
		 <td><a href='delete.php?id= ".$row['id']." ' alt='delete' >Delete</a></td>
        </tr>
       
	");}


}




}
function displayusers(){
	

include 'dbconn.php';

$sql = "SELECT * FROM users";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("	
		<tr>
        
        <td> " .$row['username']." </td>
      
        <td>".$row['email']."</td>
      
        
		 <td><a href='delete.php?user_id= ".$row['user_id']." ' alt='delete' >Delete</a></td>
        </tr>
       
	");}


}
}
function sendfeedback(){
		include 'dbconn.php';
if(isset($_POST['btn-send'])){
	$name = $_POST['name'];
	
	$feedback = $_POST['feedback'];
	
	$update = "INSERT INTO feedbacks (username,feedback) VALUES ('$name','$feedback')";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: index.php");
	}

}
} 


function addfarmer(){
		include 'dbconn.php';
if(isset($_POST['btn-send'])){
	$name_of_farmer = $_POST['name_of_farmer'];
	$farm_location = $_POST['farm_location'];
	$area = $_POST['area'];
	$no_of_trees = $_POST['no_of_trees'];
	$location = $_POST['location'];
	
	$email = $_POST['email'];
	$update = "INSERT INTO coffee_farmers (name_of_farmer, farm_location, area,no_of_trees, location, contact, email) 
	VALUES ('$name_of_farmer','$farm_location','$area','$no_of_trees','$location','$contact','$email')";
	$up = mysqli_query($con, $update);
	if(!isset($up)){
		die ("Error $up" .mysqli_connect_error());
	}
	else
	{
		header("location: admin.php");
	}


} }
function displaymarker(){
	
include 'dbconn.php';

$sql = "SELECT * FROM markers GROUP BY type";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("	
		<tr>
        
        <td> ".$row['type']." </td>
        <td>".$row['address']." </td>
        <td> ".$row['lat']."</td>
        <td> ".$row['lng']." </td>
        
       
      
        <td><a href='editmarker.php?id=".$row['id']." ' alt='edit' >Edit</a></td>
		 <td><a href='delete.php?marker_id= ".$row['id']." ' alt='delete' >Delete</a></td>
        </tr>
       
	");}


}
}
function displayevents(){
	
include 'dbconn.php';

$sql = "SELECT * FROM seminars";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("	
		<tr>
        
        <td><a href='admin_event.php?id=".$row['id']."'> " .$row['title']."</a> </td>
        <td>".$row['description']." </td>
		
		
		<td><a href='delete.php?seminar_id= ".$row['id']." ' alt='delete' >Delete</a></td>
        </tr>
       
	");}


}
}
function forums(){
	include 'dbconn.php';

$sql = "SELECT * FROM topics";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("	
		<tr>
        
        <td><a href='viewreplies.php?topic_id=".$row['topic_id']."'> " .$row['title']."</a> </td><td>".$row['author']."</td><td><a href='delete.php?forum=".$row['topic_id']."'>Delete</a></td>
       
		
		
        </tr>
       
	");}


}
}
function request(){
	include ('dbconn.php');
	$s=mysqli_query($con,"Select * FROM forumrequest");
	echo "
<table class='tableheader'  align='center' style='line-height:25px;'>
<tr>

<th>Title</th>
<th>Author</th>
<th>content</th>
<th></th><th></th>
</tr>";
	While($r=mysqli_fetch_assoc($s)){
		$id=$r['topic_id'];
	echo "<tr><td>".$r['title']."</td><td>".$r['author']."</td><td>".$r['content']."<td><a href='delete.php?request=".$id."'>Delete</a></td>
	<td><a href='approve.php?id=".$id."' >Approve</a></td></tr>";
}
echo "</table>";}

function displayfeedback(){
	
include 'dbconn.php';

$sql = "SELECT * FROM feedbacks";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("	
		<tr>
     
        <td> " .$row['username']." </td>
        <td>".$row['feedback']." </td>
		
		
		
        </tr>
       
	");}


}
}
function displaypdf(){
echo "<tr>

<th>Title</th>

<th>Description</th>

<th></th>
<th></th>
</tr>";
include 'dbconn.php';
$sql = "SELECT * FROM file WHERE type='pdf'";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("<tr>
	   <td><a href=".$row['filepath']." target='_blank' type='application/pdf/docx'>
      " .$row['title']." </a></td>
        
        <td> ".$row['description']."</td>
        
        <td><a href='editfile.php?pdf_id=".$row['id']." ' alt='edit' >Edit</a></td>
		 <td><a href='delete.php?pdf_id= ".$row['id']." ' alt='delete' >Delete</a></td>
        </tr>
	");}


}
}
function displayvideo(){

include 'dbconn.php';
echo "<tr>

<th>Title</th>

<th>Description</th>

<th></th>
<th></th>
</tr>";
$sql = "SELECT * FROM file WHERE type='mp4'";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("<tr>
<td><a href=".$row['filepath']." target='_blank' type='application/pdf/docx'>         " .$row['title']." </a></td>

        <td> ".$row['description']."</td>

        <td><a href='editfile.php?pdf_id=".$row['id']." ' alt='edit' >Edit</a></td>
		 <td><a href='delete.php?pdf_id= ".$row['id']." ' alt='delete' >Delete</a></td>
        </tr>
	");}
}
}
function displayimage(){
echo "<tr>

<th>Title</th>

<th>Description</th>

<th></th>
<th></th>
</tr>";
include 'dbconn.php';
$sql = "SELECT * FROM file WHERE type='jpg'";
$result = $con->query($sql);
if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
	echo("<tr>
<td> <a href=".$row['filepath']." target='_blank' type='application/pdf/docx'>        " .$row['title']." </a></td>

        <td> ".$row['description']."</td>

        <td><a href='editfile.php?pdf_id=".$row['id']." ' alt='edit' >Edit</a></td>
		 <td><a href='delete.php?pdf_id= ".$row['id']." ' alt='delete' >Delete</a></td>
        </tr>
	");}
}
}



function upload(){
if (isset($_FILES['my_file']['name'])){
include('dbconn.php');
if (($_FILES['my_file']['name']!="")){
	if(isset($_POST['description'])){
	$desc=$_POST['description'];
	}
	if(isset($_POST['title'])){
	$title=$_POST['title'];
	}

	$target_dir = "upload/";
	$file = $_FILES['my_file']['name'];
	$path = pathinfo($file);
	$filename = $path['filename'];
	$ext = $path['extension'];
	$temp_name = $_FILES['my_file']['tmp_name'];
	$path_filename_ext = $target_dir.$filename.".".$ext;
 if($ext=="pdf"||$ext=="mp4"||$ext=="jpg"){

if (file_exists($path_filename_ext)) {
 echo "File already exists.";

 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 
 $a=mysqli_query($con,"INSERT INTO file(filepath,filename,description,title,type) VALUES ('$path_filename_ext','$filename','$desc','$title','$ext')");
 
 echo "File Uploaded Successfully.";

 
}}}
}
}








