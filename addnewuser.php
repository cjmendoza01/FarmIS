<html>
<?php include'head.php';?>
<body>
 


	<div class="pane">
		 <?php include'nav.php';?>

<?php
	include ('dbconn.php');


		session_start();
	$newuser = $_POST['usernameinput'];
	$newpwd = $_POST['passwordinput'];
	$email= $_POST['email'];
	$password=md5($newpwd);
	$c=mysqli_query($con,"Select * FROM users WHERE username='$newuser'");
	$c2=mysqli_query($con,"Select * FROM users WHERE email='$email'");
	$r=mysqli_fetch_assoc($c);
	$r2=mysqli_fetch_assoc($c2);
	if($r==null){
		if($r2==null){	
			$insert = mysqli_query($con, "INSERT INTO `users`  (`username`, `password`, `email`) VALUES ('$newuser', '$password', '$email')");
	
			if ($insert) {
			echo "Successfully registered";
			echo "</br><a href=topics.php>Return to forums.......</a>";
			session_destroy();
							}
		}else {
			$_SESSION['id2']=1;
			header("Location: register.php");
		}
	}else {
		$_SESSION['id']=1;
		header("Location: register.php");
	}
?>
</div>
</body>
</html>