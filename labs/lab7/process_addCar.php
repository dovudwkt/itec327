
<?php 
	if(isset($_POST['addCar'])){
		extract( $_POST);		
		if (strlen(trim($plate))==0)
			die("Plate can not be blank");
	


		$dbcon = new mysqli("localhost", "root", "", "autos");
		if (mysqli_connect_errno($dbcon))
		{
		  	die("Failed to connect to MySQL: " . mysqli_connect_error());
		} 



		$query = "INSERT into cars(plate, make, model, car_type) values('$plate', '$make','$model','$car_type')";
		$resilt = mysqli_query($dbcon, $query) or die('Query failed. '.mysqli_error($dbcon));
		if(mysqli_affected_rows($dbcon)>0)
			echo "Record Saved successfuly";
		else
			echo "Could not save record";

		mysqli_close($dbcon);
	}else{
		echo "<h1>Add a car</h1>";
	}

?>
	