<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `coffee_farmers` WHERE CONCAT(`id`, `name_of_farmer`, `farm_location`, `area`, `no_of_trees`, `location`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}

 else {
    $query = "SELECT * FROM `coffee_farmers`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "farm");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}


?>

<!DOCTYPE html>
<html>
<?php include'head.php';?>

<body>
<div class="pane">
   <?php include'nav.php';?>
   <div class="content">
        <form action="search.php" method="post">
		
            <input type="text" name="valueToSearch" placeholder="Search Farms or Farmers">&ensp;
            <input type="submit" name="search" value="Search"><br/>
          </div>
            
			<div class="content">
			<table class="tableheader">
                <tr>
                   
                    <th>Farmer Name</th>
                    <th>BRGY </th>
                  
					<th>Municipality</th>
                </tr>

    
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
				
                   
                    <td><a href="farmer_profile.php?id=<?php echo $row['id'];?>"><?php echo $row['name_of_farmer'];?></a></td>
                    <td><a href="map2.php?loc=<?php echo $row['farm_location'];?>"><?php echo $row['farm_location'];?><a/></td>
					<td><a href="map.php?loc=<?php echo $row['location'];?>"><?php echo $row['location'];?></a></td>
                </tr>
                <?php endwhile;?>
            </table>
			</div>
        </form>
		
		<div class="content">
		<a href="feedback.php">send feedback</a>
		</div>
        </div>
    </body>
</html>
