
<!doctype html>
<html>
  <?php include'head.php';?>

<body>

<div class="pane">
   <?php include'nav.php';?>
<div class="content">

<?php 
session_start();
if ($_GET['title']!=null&&$_GET['id']!=null){
$a=$_GET['title'];

$b=$_GET['id'];
$_SESSION['id']=$b;

}echo"
<div class='content1'><h3> ".$a."</h3></div>
<p>Enter the following details to join. You will receive a confirmation through text or email
</p>
<form method='GET' action='join2.php'>
<p> <input type='text' name='name' placeholder='Name'required /></p>
<p> <input type='email' name='email' placeholder='e-mail'required /></p>
<p> <input type='text' name='contact'placeholder='Contact Number' required /></p>
<input type='submit' value='submit'>
</form>
";
?>
</div>
</div>
</body>
</html>