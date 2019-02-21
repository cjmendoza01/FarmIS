<?php
include ('dbconn.php');

$j=0;
$sel=mysqli_query($con,"Select * From coffee_farmers WHERE location='ALFONSO' Group BY farm_location");
while($row=mysqli_fetch_assoc($sel)){
$i=0;
$b=$row['farm_location'];
$s2=mysqli_query($con,"Select * From coffee_farmers Where farm_location LIKE '%".$b."%'");
while($row=mysqli_fetch_assoc($s2)){
$f1=$row['farm_location'];
$i++;
}echo $f1.$i;
}
?>