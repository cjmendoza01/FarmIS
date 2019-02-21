<html>

<?php
include('head.php');
include('connections.php');
if(isset($_GET['Submit'])){
$comp=$_GET['Cname'];
$cdesc=$_GET['CDesc'];
$jdesc=$_GET['JDesc'];
$quali=$_GET['Quali'];
$mob=$_GET['mobile'];
$email=$_GET['email'];
$link=$_GET['Link'];
$s=mysqli_query($connections,"INSERT INTO job_post(CompanyName,ComDesc,JobDesc,quali,Mobile,email,link) 
VALUES ('$comp','$cdesc','$jdesc','$quali','$mob','$email','$link')");
if(isset($s)){
		die ("Error $s" .mysqli_connect_error());
	}
	else
	{
		header("location: JobPost.php");
		echo"Success";
	}

}

?>
<body>
<div class="pane">
<form method="GET" >
<h5>Company Name:<input type="text" name="Cname">
<br>
Company Description:<input type="text" name="CDesc"><br>
Job Description:<input type="text" name="JDesc"><br>
Qualifications:<input type="text" name="Quali"><br>
Contact<br>
Mobile#:<input type="text" name="mobile"><br>
email:<input type="text" name="email"><br>
link:<input type="text" name="Link"><br>
<input type="Submit" value="Ok" name="Submit" >
</h5>
</form></div>
</body>

</html>