<?php
	include ('layout_manager.php');
	include ('content_function.php');
	addview($_GET['tid']);
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
						if ($_GET['status'] == 'reg_success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
						} else if ($_GET['status'] == 'login_fail') {
							echo "<h1 style='color: red;'>invalid username and/or password!</h1>";
						}
					}
					loginform();
				}
			?>
		
		</div>
		
	
		<div class="content">
		
			
			
		<?php
			
			disptopic($_GET['tid']);
			echo "<div class='content1'><p>All Replies (".countReplies($_GET['tid']).")
				  </p></div>";
			dispreplies($_GET['tid']);
			
		?>
	<div class="content2"></div>
	</div>
	<div><?php
	if (isset($_SESSION['username'])) {
				replylink($_GET['tid']);
	}	?>
		</div>
	<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
	</div>
	</div>
</body>
</html>