<?php 
// session_start();
// $_SESSION['current_user'];

include("mysqli_connect.php");

$query = "SELECT name, surname, credits FROM users ORDER BY credits DESC LIMIT 3";
$result = mysqli_query($dbcon, $query);
	if($result) {
	$pos = 1; 
	echo "<table id='top-players-table' >";
	echo "<tr><th colspan='4' style='text-align:center;background-color:#f7f4f4'> Top Players </th></tr>";
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "<tr>";
				echo "<td>".$pos."</td><td>".$row['name']."</td><td>".$row['surname']."</td><td>".$row['credits']."xp</td>";
			echo "</tr>";
			$pos++;
		}
	echo "</table>";
	}


?>