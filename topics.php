<?php
	include ('layout_manager.php');
	include ('content_function.php');
?>
<html>
<?php include'head.php';?>

<body>
   

	<div class="pane">
		<?php include'nav.php';?>

		<div class="content">
		
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg-success') {
							echo "<h5 style='color: green;'>new user registered successfully!</h5>";
						} else if ($_GET['status'] == 'login_fail') {
							echo "<h5 style='color: red;'>invalid username and/or password!</h5>";
						}
					}
					loginform();
				}
			?>
		</div>
		
		<?php
			if (isset($_SESSION['username'])) {
				echo "<div class='content'><p><a href='/forum/newtopic.php'>
					  add new topic</a></p></div>";
			}
		?>
		<div class="content">
		
			<?php		
					disptopics(); 
					?>
					
					
		</div>
		<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
	</div>
</body>
</html>