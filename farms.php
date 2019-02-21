
<!DOCTYPE html>
<html>
<?php include'head.php';
include 'dbconn.php';
$sel=mysqli_query($con,"Select * From coffee_farmers Group BY location");
 ?>
<body>
<div class="pane">
   <?php include'nav.php';?>
   <div class="content">
        <form action="search.php" method="post">
		
            <input type="text" name="valueToSearch" placeholder="Search Farms or Farmers">&ensp;
            <input type="submit" name="search" value="Search"><br/></form>
          </div><div class="content">
		  <H1>Cavite Farms</h1>
<?php
while($row=mysqli_fetch_assoc($sel)){
$b=$row['location'];
echo "<br><h2><a href='map.php?loc=".$b."'>".$b."</a></h2><br>";
$s2=mysqli_query($con,"Select * From coffee_farmers Where location LIKE '%".$b."%' GROUP BY farm_location");
while($row=mysqli_fetch_assoc($s2)){

$f1=$row['farm_location'];

echo "<h4><a href='map2.php?loc=".$f1."'>".$f1."</a><br>";
}echo "</h4><br>";
}
?>



		  
        </div>
		
		<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
       </div>
    </body>
</html>
