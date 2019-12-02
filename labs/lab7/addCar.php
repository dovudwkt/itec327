<!DOCTYPE html>
<html>
<head>
	<title>Add Car</title>
	<style type="text/css">
		input, label{
			margin:10px;
			display: block;
		}
	</style>
</head>
<body>
	<a href="menu.html">Main menu</a>
	<form action="addCar.php" method="post">
		<label>Plate:<input type="text" name="plate"></label>
		<label>Make:<input type="text" name="make"></label>
		<label>Model:<input type="text" name="model"></label>
		<label>Car Type:
			<select name="car_type">
				<option value="mini">mini</option>
				<option value="economy">economy</option>
				<option value="luxury">luxury</option>
				<option value="convertible">convertible</option>
				<option value="sports">sports</option>
				<option value="van">van</option>
			</select>
		</label>
		<input type="submit" name="addCar" value="Add">
	</form>
<?php 
	if(isset($_POST['addCar']))
		include("process_addCar.php");
?>

	
</body>
</html>
