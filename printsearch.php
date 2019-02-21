<?php
session_start();
if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `coffee_farmers` WHERE CONCAT( `farm_location`, `location`) LIKE '%".$valueToSearch."%' Order By location";
    $search_result = filterTable($query);
    
}

 else {
    $query = "SELECT * FROM `coffee_farmers` Order By location";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "farm");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}
$_SESSION["query"]=$query;

?>

<!DOCTYPE html>
<html>
<title>NCRDEC Report</title>
<?php include'head.php';?>
<?php include'head.php';?>
<script language="javascript">
function printdiv(printpage)
{
var headstr = "<html><title></title><head><link rel='stylesheet' href='assets/bootstrap/css/bootstrap.min.css'>    <link rel='stylesheet' href='assets/css/styles.css'><link href='styles/main.css' type='text/css' rel='stylesheet'/><body><center><h3>National Coffee Research Development<br> and Extension Center</h3><h5>Cavite State University, Don Severino de las Alas Campus Indang, Cavite Philippines <br>www.ncrdecphilippines.com<br>+6346 415 03 29</h5></center>";
var footstr = "</body>";
var newstr = document.all.item(printpage).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
</script>

<body>

<div class="pane">
<?php include ('nav2.php');?>
   <div class="content">
    
        <form action="printsearch.php" method="post">
		
            <input type="text" name="valueToSearch" placeholder="brgy or farm location">&ensp;
            <input type="submit" name="search" value="Search">
		<br><br>
		<button   onClick="printdiv('content');" value=" Print ">print</button>
		<button> <a href="excel2.php">excel</a></button>
          </div>
            
			<div class="content"><div id="content">
			
			<h3>Cavite Farmers and Location</h3><br>
			<table class="tableheader">
              
                   
                   

    
                <?php $string1=""; $a=1; $j=1; while($row = mysqli_fetch_array($search_result)):?>
                
			<?php 
			$string2=$row['location'];
					if ($string1!=$string2){
						echo "<td><b>".$string2."</b></td></tr></tr>";
						echo "  <tr> <th>Farmer Name</th>
                    <th>Brgy</th>
					
                  <th>Area(ha)</th><th>trees</th><th>Contact</th><th>Email</th>
					
                </tr><tr>";
						
					$string1=$string2;
					}
					?>
                   
                  <H5>  <td><?php echo $a++; echo". "; echo $row['name_of_farmer'];?></td>
                    
					<td><?php echo $row['farm_location'];?></td>
					
					<td><?php echo $row['area'];?></td>
					<td><?php echo $row['no_of_trees'];?></td>
					<td><?php echo $row['contact'];?></td>
					<td><?php echo $row['email'];?></td>
					
                </tr>
                <?php endwhile;?>
            </table>
			</div>
			</div>
        </form>
		
		<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
        </div>
    </body>
</html>
