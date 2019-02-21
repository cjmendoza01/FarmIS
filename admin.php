<?php
include 'content_function.php';
session_start();

$a="";
if (isset($_GET['aid'])){
$a=$_REQUEST['aid'];}
?>
<?php
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    
    $query = "SELECT * FROM `coffee_farmers` WHERE CONCAT(`id`, `name_of_farmer`, `farm_location`, `area`, `no_of_trees`, `location`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}

 else {
    $query = "SELECT * FROM `coffee_farmers`";
    $search_result = filterTable($query);
}


function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "farm");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>

<!doctype html>
<?php include'head.php';?>

<body onload= myFunctionl(<?php echo $a;  ?>)>


<div class="pane">
   
   
<?php include'nav2.php';

if(isset($_SESSION['av'])){
$_SESSION['ad']="display:block";
$log="display:none";
echo"<a href='adminlogout.php'>Signout</a>";}
else{
	
$_SESSION['ad']="display:none";
$log="display:block";}?>

<div style=<?php echo $_SESSION['ad'];?> id ="nv">
<button onclick="myFunctionl(0)">Markers</button>
	<button onclick="myFunctionl(1)">Users</button>
	<button onclick="myFunctionl(2)">Farms</button>
	<button onclick="myFunctionl(3)"> Events</button>
	
	<button onclick="myFunctionl(4)">Files</button>
	<button onclick="myFunctionl(8)"> Forums</button>
	<button onclick="myFunctionl(7)">Feedbacks</button>
	
	</div>
<div class="content">
<div style=<?php echo $log; ?>>
<form method="POST" action="adminlogin.php">
ID<input type="password" name="id" required>
Password<input type="password" name="pass" required>
<input type="Submit" value="Login">
</form><?php if (isset($_GET['status'])){
echo "<h4>login fail</h4>";	
}?>
</div>
<div>


<div style ="display: none" id="myDIV" >
<a href='index1.php' >Insert Markers</a></br>

 <div>

<table class="tableheader"  align="center" style="line-height:25px;">
<tr>
<th>Name</th>

<th>Address</th>
<th>Latitude</th>
<th>Longitude</th>

<th></th>
<th></th>
</tr>

<?php displaymarker();?>
</table>
</div>

</div>
</div>


<div>


<div style ="display: none" id="myDIV1">
</br>
 <div>

<table class="tableheader"  align="center" style="line-height:25px;">
<tr>

<th>Username</th>

<th>Email</th>
<th></th>

<th></th>
<th></th>
</tr>

<?php 

displayusers();?>
</table>
</div>

</div>
</div>

<div>


<div style ="display: none" id="myDIV2">

        <form action="admin.php?aid=2" method="post">
		
            <input type="text" name="valueToSearch" placeholder="brgy or farm location">&ensp;
            <input type="submit" name="search" value="Search">
		<br><br>
		</form>
          

</br><a href="printsearch.php">Print Report</a>
</br><a href="addfarmer.php">Add New Farmer</a>
 <div>
 
<table class="tableheader"  align="center" style="line-height:25px;">
<tr>
<th>ID</th>
<th>Name</th>
<th>BRGY</th>
<th>Area</th>
<th>No. Of Trees</th>
<th>Municipality</th>
<th></th>
<th></th>
</tr>

<?php $a=1;while($row = mysqli_fetch_array($search_result)):?>
                <tr>
				
                   <td><?php echo $a++;?></td>
                    <td><?php echo $row['name_of_farmer'];?></td>
                    <td><?php echo $row['farm_location'];?></td>
					           <td><?php echo $row['area'];?></td>
							              <td><?php echo $row['no_of_trees'];?></td>
					<td><?php echo $row['location'];?></td>
					<?php echo"<td><a href='edit.php?id=".$row['id']." ' alt='edit' >View/Edit</a></td>
		 <td><a href='delete.php?id= ".$row['id']." ' alt='delete' >Delete</a></td>";?>
                </tr>
                <?php endwhile;?>
</table>
</div>

</div>
</div>



<div>


<div style ="display: none" id="myDIV3">
</br>
 <div>
 <button onclick="myFunctionl(6)">Add Events</button>
<table class="tableheader"  align="center" style="line-height:25px;">
<tr>

<th>Title</th>
<th>Description</th>
<th></th>
<th></th>
</tr>

<?php displayevents();?>
</table>
</div>

</div>
</div>
<div>


<div style ="display: none" id="myDIV6">
</br>
 <div>

<h1>Add New Event</h1>
</br>

<form method="GET" action="save_event.php">
<p>Event name:</p>
<input type="Text" name="title" required />
<p>Description</p><textarea rows="20" cols="100" name="description" required></textarea></br>
<input type="Submit" name="Submit" value="Submit"/>

</form>
</div>
</div>

</div>

<div>


<div style ="display: none" id="myDIV4">
</br>
 <div>
 
<table class="tableheader"  align="center" style="line-height:25px;">
<button onclick="myFunctionl(5)">Upload</button>
<br><button onclick="file(0)">pdf</button><button onclick="file(1)">video</button><button onclick="file(2)">image</button>
</table>
</div>
<div style="display: none" id="pdf">
<table class="tableheader"  align="center" style="line-height:25px;">
<?php displaypdf();?></table>
</div>
<div style="display:none" id="image">
<table class="tableheader"  align="center" style="line-height:25px;">
<?php displayimage(); ?></table>
</div>
<div style="display:none" id="video">
<table class="tableheader"  align="center" style="line-height:25px;">
<?php displayvideo(); ?></table>
</div>
</div>


<script>
function file(x){
var a=document.getElementById("pdf");
var b=document.getElementById("image");
var c=document.getElementById("video");
if (x==0){
a.style.display="block";
b.style.display="none";
c.style.display="none";
}
if (x==1){
c.style.display="block";
a.style.display="none";
b.style.display="none";
}
if (x==2){
b.style.display="block";
c.style.display="none";
a.style.display="none";

}
}

</script>
</div>




<div>


<div style ="display: none" id="myDIV5">
</br>
 <div>
 
<table class="tableheader"  align="center" style="line-height:25px;">
<tr>
<form name="form" method="post" action ="admin.php?aid=5" enctype="multipart/form-data" >
<p>.pdf, .jpg, .mp4 files are only allowed</p>
<p>Title</p><input type="text" name="title" required/></br>
<p>Description</p><textarea rows="10" cols="35" name="description"></textarea></br>
<input type="file" name="my_file" /><br /><br />
<button type="submit" name="submit" onclick="update()">Upload</button>
<?php upload();?>
</form>

</tr>

</table>
</div>

</div>
</div>












<div style ="display: none" id="myDIV7">
</br>
 <div>
 
<table class="tableheader"  align="center" style="line-height:25px;">
<tr>

<th>Name</th>
<th>Feedback</th>

</tr>

<?php displayfeedback();?>
</table>
</div>

</div>

<div>


<div style ="display: none" id="myDIV8">
</br>
 <div>
 <h4>Topics</h4>
<table class="tableheader"  align="center" style="line-height:25px;">
<tr>

<th>Title</th>
<th>Author</th>
<th></th>
</tr>

<?php 
forums();?>
</table>
<hr>
<h4>Requests</h4>
<?php
request();
?>
</div>





</div>
</div>
<script>
function myFunctionl(y) {
	var z0 = document.getElementById("myDIV");
	var z1 = document.getElementById("myDIV1");
	var z2 = document.getElementById("myDIV2");
	var z3=  document.getElementById("myDIV3");
	var z4=  document.getElementById("myDIV4");
	var z5=  document.getElementById("myDIV5");
	var z6=  document.getElementById("myDIV6");
	var z7=  document.getElementById("myDIV7");
	var z8=  document.getElementById("myDIV8");
	var z9=  document.getElementById("myDIV9");
	if (y==0){
	if (z0.style.display === "none") {
		z1.style.display = "none";
       z0.style.display = "block";
		  z2.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z0.style.display = "none";
    }
	
	}
	else if (y==1){

    if (z1.style.display === "none") {
		z0.style.display = "none";
       z1.style.display = "block";
		  z2.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z1.style.display = "none";
    }
}else if (y==2){

    
    if (z2.style.display === "none") {
		z0.style.display = "none";
       z2.style.display = "block";
		  z1.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z2.style.display = "none";
    }
	}
	else if (y==3){

    
    if (z3.style.display === "none") {
		z0.style.display = "none";
       z3.style.display = "block";
		  z1.style.display = "none";
		   z2.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z3.style.display = "none";
    }
	}
	else if (y==4){

    
    if (z4.style.display === "none") {
		z0.style.display = "none";
       z4.style.display = "block";
		  z1.style.display = "none";
		   z3.style.display = "none";
		 z2.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z4.style.display = "none";
    }
	}else if (y==5){

    
    if (z5.style.display === "none") {
		z0.style.display = "none";
       z5.style.display = "block";
		  z1.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z2.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z5.style.display = "none";
    }
	}else if (y==6){

    
    if (z6.style.display === "none") {
		z0.style.display = "none";
       z6.style.display = "block";
		  z1.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z2.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z6.style.display = "none";
    }
	}else if (y==7){

    
    if (z7.style.display === "none") {
		z0.style.display = "none";
       z7.style.display = "block";
		  z1.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z2.style.display = "none";
		    z8.style.display = "none";
			 z9.style.display = "none";
    } else {
        z7.style.display = "none";
    }
	
	}
	else if (y==8){

    
    if (z8.style.display === "none") {
		z0.style.display = "none";
       z8.style.display = "block";
		  z1.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z2.style.display = "none";
			 z9.style.display = "none";
    } else {
        z8.style.display = "none";
    }
	}else if (y==9){

    
    if (z9.style.display === "none") {
		z0.style.display = "none";
       z9.style.display = "block";
		  z1.style.display = "none";
		   z3.style.display = "none";
		 z4.style.display = "none";
		  z5.style.display = "none";
		   z6.style.display = "none";
		   z7.style.display = "none";
		    z8.style.display = "none";
			 z2.style.display = "none";
    } else {
        z9.style.display = "none";
    }
	}
	
	
}</script>
</body>
</html>