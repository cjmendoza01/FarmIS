<h1>NCRDEC's Semminars/Trainings</h1>
<a href="newevent.php">add new event</a></br></br>
<?php
include('dbconn.php');
$select=mysqli_query($con,"SELECT * FROM seminars");
echo "<table>";
while($row=mysqli_fetch_assoc($select)){
	
echo "<tr><td><a href='event.php?id=".$row['id']."'>".$row['Title']."</a></td><td><a href='deleteevent.php?id=".$row['id']."'>delete</a></td>
<td><a href='edit.php?id=".$row['id']."'>edit</a></td></tr>"; 


}

?>