<?php 
	if(isset($_POST['searchCar'])){
		extract($_POST);

		$dbcon = new mysqli("localhost", "root", "", "autos");
		if (mysqli_connect_errno($dbcon))
		{
		  	die("Failed to connect to MySQL: " . mysqli_connect_error());
		} 

		$query = "SELECT * FROM cars WHERE ";
		if($based_on == 'plate')
			$query .= "plate like '$srch_val%'";
		elseif($based_on == 'make')
			$query .= "make like '$srch_val%'";
		elseif($based_on == 'model')
			$query .= "model like '$srch_val%'";
		else
			$query .= "car_type like '$srch_val%'";

		$result = mysqli_query($dbcon, $query) or die("Query failed");

		echo '<br/>'.mysqli_num_rows($result).' record(s) found';

		if( mysqli_num_rows($result) > 0 ){
			echo '<table border="1"><tr><th>Plate</th><th>Make</th><th>Model</th><th>Car Type</th></tr>';
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC) ){
				echo '<tr>';
				echo '<td>'.$row['plate'].'</td>';
				echo '<td>'.$row['make'].'</td>';
				echo '<td>'.$row['model'].'</td>';
				echo '<td>'.$row['car_type'].'</td>';
				echo '</tr>';
			}
			echo '</table>';
		}


		mysqli_free_result($result); 
		mysqli_close($dbcon);

	}

 ?>