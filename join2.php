
<html>


<?php include'head.php';?>

<body>
<div class="pane">
<?php include'nav.php';?>
<div class="content";>
<?php
session_start();
include('dbconn.php');
$id=$_SESSION['id'];
$name=$_GET['name'];
$email=$_GET['email'];
$contact=$_GET['contact'];

$a=mysqli_query($con,"INSERT INTO joine(name,email,contact,event_id) 
VALUES('".$name."','".$email."','".$contact."','".$id."')");
if($a){
echo "You have successfully registered. Confirmation and other Procedures will be sent through text or email";}
echo "</br><a href='viewevents.php'>Go back to Events</a>";
session_destroy();
?>

</div>
</div>
</body>
</html>