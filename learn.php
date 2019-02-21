<html>
   
<?php include'head.php';
include ('dbconn.php');
?>
<body>

<div class="pane">
<?php include'nav.php';?>
<div><div class="content">
   


<?php
echo"<div class='content1'>
<h3>Topics</h3>
</div>";
echo"<form action='learn.php' method='POST'><input type='text' name='text'>
<input type='submit'value='Search' name='search'>
</form>";
?>
<div>

<?php
if (isset($_POST['search'])){
$text=$_POST['text'];
$select=mysqli_query($con,"SELECT * FROM file WHERE  CONCAT (title,description) like '%".$text."%' GROUP BY title");

while($row=mysqli_fetch_assoc($select)){

echo"<div class='content1'><table><tr><td ><a href=".$row['filepath']." target='_blank' type='application/pdf/docx'>".$row['title']."</a></td></tr>";
echo"<tr><td><h5>Type : ".nl2br($row['type'])."</h5></td></tr>";
echo"<tr><td><h5>Description : ".nl2br($row['description'])."</h5></td></tr></table></div>";

}
echo "</div>";}
?><br>
</div></div><div class="content">
		<a href="feedback.php">send feedback</a>
		</div></div></div></div>
	
</body>
</html>	