<?php
require("connect.php");



$name = $_GET['name'];
$address = $_GET['address'];
$lat = $_GET['lat'];
$lng = $_GET['lng'];



$connection=mysql_connect ("localhost", $username, $password);
if (!$connection) {
  die('Not connected : ' . mysql_error());
}


$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}


$query = sprintf("INSERT INTO markers " .
         " (id, type, address, lat, lng ) " .
         " VALUES (NULL, '%s', '%s', '%s', '%s');",
         mysql_real_escape_string($name),
         mysql_real_escape_string($address),
         mysql_real_escape_string($lat),
         mysql_real_escape_string($lng));


$result = mysql_query($query);
if ($result){
header("Location: admin.php");         }
if (!$result) {
  die('Invalid query: ' . mysql_error());
}


?>
