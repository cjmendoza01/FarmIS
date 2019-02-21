<?php
	include ('layout_manager.php');
	include ('content_function.php');
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
			<a href="topics.php">Return</a>
		</div>
		<div class="content">
		<h5>Note: Your topic will be evaluated by the admin before being posted!</h5>
			<?php 
				if (isset($_SESSION['username'])) {
					echo "<form action='/forum/addnewtopic.php'method='POST'>
						  <p>Title: </p>
						  <input type='text' id='topic' name='topic' size='100' required/>
						  <p>Content: </p>
						  <textarea id='content' name='content' required></textarea><br />
						  <input type='submit' value='add new topic' /></form>";
				} else {
					echo "<p>please login first or <a href='register.php'>click here</a> to register.</p>";
				}
			?>
		</div>
		
		<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
	</div>
</body>
</html>