<html>
<?php include'head.php';?>

<body>
 


	<div class="pane">
		<?php include'nav.php';?>
		<div class="content">
			<form action="addnewuser.php" method="POST">
				
				<input type="text" id="usernameinput" name="usernameinput" placeholder="Username" required /> <br>
				
				<input type="password" id="passwordinput" name="passwordinput" placeholder="Password" required /><br>
				<input type="email" id="email" name="email" placeholder="email" required /><br>
				<input type="submit" value="Register" />
			</form>
			<?php 
			session_start();
			if(isset($_SESSION['id'])){
			$x=$_SESSION['id'];
			if ($x==1){
				echo "<p color=red> username already used!!!</p>";
			}}
				if(isset($_SESSION['id2'])){
			$x=$_SESSION['id2'];
			if ($x==1){
				echo "<p color=red> email already used!!!</p>";
			}}
				session_destroy();?>
		</div>
		
		
		<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
	</div>
</body>
</html>