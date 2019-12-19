
<?php 
$newPswd = "";
if(isset($_POST['gnt_pswd'])){
	// extract($_POST['gnt_pswd']);
$username = $_POST['username'];
$email = $_POST['email'];

function password_generate($chars) 
{
  	$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
	return substr(str_shuffle($data), 0, $chars);
}

$newPswd = password_generate(8);
$hashed_passcode = password_hash($newPswd, PASSWORD_DEFAULT); 

include("mysqli_connect.php");
$query = "UPDATE users SET password = '".$hashed_passcode."' WHERE username = '".$username."' AND email = '".$email."'";
if(mysqli_query($dbcon, $query))
{	
	echo "SUCCESS";
}else{
	echo "Password could not be reset";
} 
mysqli_close($dbcon);


}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Forgot password</title>
</head>
<body>
	<!-- <form action="<?php echo $_SERVER['self'] ?>" method='POST'> -->
	<form action="forgot-password.php" method='POST'>
		Enter username:<input type="text"  name="username" value="<?php if(isset($username))echo $username ?>"><br>
		Enter email:   <input type="email" name="email" value="<?php if(isset($email))echo $email ?>"><br>
		New password:  <input type="text"  name="new_password" readonly 
				value="<?php if(isset($newPswd))echo $newPswd ?>"><br>
		<input type="submit" name="gnt_pswd" value="Generate password">
		
	</form>
</body>
</html>