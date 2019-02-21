<?php
session_start();
include('dbconn.php');
$a=$_POST['id'];
$b=$_POST['pass'];
$s=mysqli_query($con,"SELECT * FROM admin ");
if (isset($s)){
	$t=mysqli_fetch_assoc($s);
	$o=$t['adn'];
	$p=$t['pss'];
	if ($b==$p&&$a==$o){
	$_SESSION['av']="display:block";
header("location:admin.php");
	}else{header("location:admin.php?status=1");}
		
}
?>