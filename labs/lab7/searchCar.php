<!DOCTYPE html>
<html>
<head>
	<title>Search Car</title>
</head>
<body>
<a href="menu.html">Main menu</a>
<h2>Search a car</h2>
<form action="searchCar.php" method="post">
	<label>Search: <input type="text" name="srch_val"> </label>
	<select name="based_on">
		<option value="plate">Based on Plate</option>
		<option value="make">Based on Make</option>
		<option value="make">Based on Model</option>
		<option value="car_type">Based on Car Type</option>
	</select>
	<input type="submit" name="searchCar" value="Search">
	<input type="reset"  value="Reset">
</form>

<?php 
if(isset($_POST['searchCar']))
	include("process_searchCar.php");
 ?>

</body>
</html>