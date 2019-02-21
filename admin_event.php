<!doctype html>



<html>
<?php include'head.php'?>


<body>
<div class="pane">
  


<A HREF="admin.php">Back</a>
<div class="content">
<div id="div_print">
<center>
<h3>National Coffee Research Development and Extension Center</h3>
<h5>Cavite State University, Don Severino de las Alas Campus
Indang, Cavite Philippines 
<br>
www.ncrdecphilippines.com
<br>+6346 415 03 29
</h5>
</center>
<?php
session_start();
include ('dbconn.php');
$id=$_GET['id'];
$select=mysqli_query($con,"Select * From seminars WHERE id=".$id."");

$row=mysqli_fetch_assoc($select);
$title=$row['title'];
echo "<div class='content1'><h3>".$title."</h3></div>
<div class='content2'></br>";
$query="SELECT * FROM joine WHERE event_id =".$id."";
$select2=mysqli_query($con,$query);
$_SESSION["query"]=$query;
$_SESSION["title"]=$title;


?><table class='tableheader'>
<tr><th>Name</th><th>Contact#</th><th>Email</th></tr>
<?php $a=1;  while($row = mysqli_fetch_array($select2)):?>
                <tr>
			
                   
                  <td><?php echo $a++; echo".&ensp;"; echo $row['name'];?></td>
                    <td><?php echo $row['contact'];?></td>
					<td><?php echo $row['email'];?></td>
					
                </tr>
                <?php endwhile;?>
</table>
</div>
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><head></head><body>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>

</div>
</div>
<div class="content">
<input name="sumbit" type="submit" class="submit"   onClick="printdiv('div_print');" value=" Print ">
<button> <a href="excel.php">excel</a></button>
</div>
</div>
</body>
</html>
