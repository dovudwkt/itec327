
<?php 
if(isset($_POST['updt_pswd'])){

	$username = $_POST['username'];
	$email = $_POST['email'];
	$old_pswd = $_POST['old_password'];
	$new_pswd = $_POST['new_password'];

	$hashed_passcode = password_hash($new_pswd, PASSWORD_DEFAULT); 

	include("mysqli_connect.php");
	$query = "UPDATE users SET password = '".$hashed_passcode."' WHERE username = '".$username."' AND email = '".$email."'";
	if(mysqli_query($dbcon, $query))		
		header("Location: login.php");
	else
		echo "Password could not be udpdated";

	mysqli_close($dbcon);

}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Update Password</title>
</head>
<body>
	<!-- <form action="<?php echo $_SERVER['self'] ?>" method='POST'> -->
	<form action="password-update.php" method='POST'>
		Username:<input type="text"  name="username" value="<?php if(isset($username))echo $username ?>"><br>
		Email:<input type="email" name="email" value="<?php if(isset($email))echo $email ?>"><br>
		Old password:  <input type="text"  name="old_password" 
		value="<?php if(isset($newPswd))echo $newPswd ?>"><br>
		
		New password:  <input type="text"  name="new_password"  
		value="<?php if(isset($newPswd))echo $newPswd ?>"><br>
		
		<input type="submit" name="updt_pswd" value="Update Password">
		
	</form>
</body>
</html>