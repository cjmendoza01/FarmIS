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

		<div class="loginpane">
			<?php
				session_start();
				if (isset($_SESSION['username'])) {
					logout();
				} else {
					if (isset($_GET['status'])) {
						if ($_GET['status'] == 'reg-success') {
							echo "<h1 style='color: green;'>new user registered successfully!</h1>";
						} else if ($_GET['status'] == 'login-fail') {
							echo "<h1 style='color: red;'>invalid username and/or password!</h1>";
						}
					}
					loginform();
				}
			?>
		</div>
		<div class="forumdesc">
			
			<?php
				if (!isset($_SESSION['username'])) {
					echo "<p>please login first or <a href='register.php'>click here</a> to register.</p>";
				}
			?>
		</div>
		<?php
			if (isset($_SESSION['username'])) {
				replytopost($_GET['tid']);
			}
		?>
		<div class="content">
			<?php disptopic($_GET['tid']); ?>
		</div>
		<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
	</div>
</body>
</html>