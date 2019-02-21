<?php

include 'content_function.php';
if (isset($_GET['page'])){
$page=$_GET['page'];}
?>

<!doctype html>
<html>
<?php include'head.php';?>
<body>
<div class="pane">
    <?php include'nav.php';?>
<div class="content">
<form method="post">
<table class="tableheader">
<tr><td><label>Name:</label></td></tr> 
<td><input type="text" name="name" required></td></tr>
<tr><td><label>Feedback:</label></td></tr> 
<td><textarea  type="text" name="feedback" value="feedback" required></textarea></td></tr>


<?php sendfeedback();?>

</table>
<button type="submit" name="btn-send" id="btn-send" ><strong>Send</strong></button>

</form>

<script>
function update(){
	
	
	
	var x;
	if(confirm("Sent") == true){
		x= "update";
	}
}
</script>
</div>
</body>
</html>