<html>
 <?php include'head.php';?>
 <div class="pane">
<h1>
Create account
</h1>
<form method="POST">
username<br><input type="text" name="user"><br><br>
Pass<br><input type="password" name="pass"><br>
<input type="submit" name="submit">
</form>
<?php
include ('db.php');
if(isset($_POST['submit'])){
    $user=$_POST['user'];
    $pass=$_POST['pass'];
include ('db.php');
    $url = 'http://127.0.0.1:7890/account/generate';
    $maps_json = file_get_contents($url);
    $maps_array = json_decode($maps_json, true);
    $pk = $maps_array['privateKey'];
    $add = $maps_array['address'];
    $pubk = $maps_array['publicKey'];

    echo "PrivateKey:".$pk."<br>";
    echo "PrivateKey:".$add."<br>";
    echo "PrivateKey:".$pubk ;
    $update = "INSERT INTO wallet (privatekey, publickey, addresss, username, pass) 
	VALUES ('$pk','$add','$pubk','$user','$pass')";
	$up = mysqli_query($con, $update);
}
?></div>
<table class="tableheader"  align="center" style="line-height:25px;">
<tr>
<th>
PrivateKey
</th>
<th>PublicKey</th>
<th>address</th>
<th>username</th>
</tr>
    <?php
    $sql="SELECT * FROM wallet";
    $result=$con->query($sql);
    while($row = $result->fetch_assoc()){
        echo("	
            <tr>
            
            <td> ".$row['privatekey']." </td>
            <td>".$row['publickey']." </td>
            <td> ".$row['addresss']."</td>
            <td><a href=''>".$row['username']." </a></td>
            </tr>
            ");}


    ?>  
</table>

</html>
