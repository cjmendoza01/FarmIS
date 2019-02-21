<?php
	function loginform() {
		echo "<form action='/forum/validatelogin.php' method='POST'>
			  <p><input type='text' id='usernameinput' name='usernameinput' placeholder='Username'required='required' />
			
				<input type='password' id='passwordinput' name='passwordinput'placeholder='Password' required='required' />
				&ensp;
				<input type='submit' value='Login' />&ensp;
				<button type='button' onClick='location.href=\"/forum/register.php\";'>Register</button>
				</p>
			</form>";
	}
	
	function logout() {
		echo ("<p><form action='logout.php' method='GET'>Logged in as: ".$_SESSION['username']."&ensp;
				
				<input type='submit' value='Logout' /></form></p>");
	}
?>