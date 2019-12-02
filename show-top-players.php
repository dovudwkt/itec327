<?php 
// session_start();
// $_SESSION['current_user'];

include("mysqli_connect.php");

$query = "SELECT * FROM users ORDER BY credits DESC LIMIT 3";
$result = mysqli_query($dbcon, $query);
	if($result) {
	$pos = 1; 
	echo "<table id='top-players-table' >";
	echo "<tr><th colspan='5' style='text-align:center;background-color:#f7f4f4'> Top Players </th></tr>";
	echo "<tr><td> </td> <td>Name</td><td>Credits</td><td id='wins-icon'></td><td id='loses-icon'></td>  </tr>";
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "<tr>";
				echo "<th>".$pos."</th><td>".$row['username']."</td><td>".$row['credits']."xp</td><td class='text-success'>".$row['wins']." </td><td class='text-danger'>".$row['loses']."</td>";
			echo "</tr>";
			$pos++;
		}
	echo "</table>";
	}


?>