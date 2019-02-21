<?php
include ('dbconn.php');
$sel= mysqli_query($con,"SELECT * FROM coffee_farmers");
$sel2=mysqli_query($con,"SELECT * FROM coffee_farmers");
$arr=array();
$arr2=array();
$i=0;
while($row=mysqli_fetch_array($sel)){
$b=$row['name_of_farmer']; 
$arr[$i]=$b;
$i++;
}
$j=0;
while($row2=mysqli_fetch_array($sel2)){
	$a=$row2['name_of_farmer'];
$arr2[$j]=$a;	
$j++;
	}
$ss=sizeof($arr); 	
for($l=0;$l<$ss;$l++){
$al=$arr[$l];
for($l2=0;$l2<$ss;$l2++){
$ll2=$arr2[$l2];
if ($al==$ll2)
{echo $ll2;}

}


}

?>