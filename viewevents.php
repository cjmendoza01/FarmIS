  <html>
  <?php include'head.php';?>

<body>
<div class="pane">
   <?php include'nav.php';?>
   
<div class="content">

<?php
echo "<div class='content1'><h3>NCRDEC's Semminars/Trainings</h3></div>";
include('dbconn.php');
$select=mysqli_query($con,"SELECT * FROM seminars");
echo "<table>";
while($row=mysqli_fetch_assoc($select)){
	
echo "<tr><td><div class='content1'><a href='event.php?id=".$row['id']."'>".$row['title']."</a></div></td></tr></table>";


}

?>
<div class="content2"></div>
</div>

	<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
</div>
</body>
</html>