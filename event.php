<html>
   <?php include'head.php';?>
<body>
<div class="pane">
   <?php include'nav.php';?>
   <div class="content">
   <a href="viewevents.php">back<a></div>
<div class="content">
<div><div>
<?php
include ('dbconn.php');
$id=$_GET['id'];
$select=mysqli_query($con,"Select * From seminars WHERE id=".$id."");

$row=mysqli_fetch_assoc($select);

echo "<div class='content1'><h3>".$row['title']."</h3></div>
<h4><div class='content2'>Description :</h4>";
echo"<div class='content2'> ".nl2br($row['description'])."</div>";

echo"<br>
<div class='content2'><a href='join.php?id=".$id."&title=".$row['title']."'>Click here to join</a></div>"
?>
</div></div></div>
<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>

</body>
</html>
