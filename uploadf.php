<html>

<body>
<div class="pane">
<div class="content">
<h1>Topics</h1>
<a href="upload.php">Add a file</a>
</br>
<a href="b.php">Delete a file</a>

<?php
include ('dbconn.php');
$select=mysqli_query($con,"SELECT * FROM file ");
$target="_blank";
$type="application/pdf/docx";
echo "<TABLE><tr><td>Title</td><td>Description</td></tr>";
while($row=mysqli_fetch_assoc($select)){

echo"<table><tr><td><a href=".$row['filepath']." target=".$target." type=".$type.">".$row['title']."</a></td>
<td>".$row['description']."</td></tr>";

}
echo "</table>";


?>
</body>
</html>	