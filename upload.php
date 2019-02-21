<html>
<?php include'head.php';?>

<?php
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
 if($ext=="pdf"){

if (file_exists($path_filename_ext)) {
 echo "File already exists.";
 }else{
 move_uploaded_file($temp_name,$path_filename_ext);
 $a=mysqli_query($con,"INSERT INTO file(filepath,filename,description,title) VALUES ('$path_filename_ext','$filename','$desc','$title')");
 
 echo "File Uploaded Successfully. <a href='uploadf.php'>go back...</a>";
 
}}}
}?>

</html>