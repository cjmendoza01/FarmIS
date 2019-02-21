<!doctype html>



<html>
<?php include'head.php';?>


<body>
<div class="pane">
<?php include'nav2.php';?>



<div class="content">

<?php
include ('dbconn.php');
$id=$_GET['topic_id'];
$select=mysqli_query($con,"Select * From replies WHERE topic_id=".$id."");



?>
<h3>Comments</h3>
<table class='tableheader'>
<tr><th>Author</th><th>Comment</th><th>Date Posted</th><th></th></tr>
<?php $a=1;  while($row = mysqli_fetch_array($select)):?>
                <tr>
			
                   
                  <td><?php echo $a++; echo".&ensp;"; echo $row['author'];?></td>
                    <td><?php echo $row['comment'];?></td>
					<td><?php echo $row['date_posted'];?></td>
					<td><?php echo"<a href='delete.php?reply_id= ".$row['reply_id']."&vrid=".$_GET['topic_id']." ' alt='delete' >Delete</a></td>

                </tr>";?>
                <?php endwhile;?>
</table>
</div>
</div>
</div>
</body>
</html>
