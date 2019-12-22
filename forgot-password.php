<?php 
$newPswd = "";
if(isset($_POST['gnt_pswd'])){
	// extract($_POST['gnt_pswd']);
$username = $_POST['username'];
$email = $_POST['email'];

$newPswd = password_generate(8);
$hashed_passcode = password_hash($newPswd, PASSWORD_DEFAULT); 

include("mysqli_connect.php");
$query = "UPDATE users SET password = '".$hashed_passcode."' WHERE username = '".$username."' AND email = '".$email."'";
$result = mysqli_query($dbcon, $query);

if(mysqli_affected_rows($dbcon) == 1)
{	
	$msg = "Copy generated password to access your account and update the password from Settings in your profile.";
}else{
	$msg = "Password could not be generated. Username or email is not valid.";
	$newPswd = "";
} 
mysqli_close($dbcon);

}

function password_generate($chars) 
{
  	$data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
	return substr(str_shuffle($data), 0, $chars);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Forgot Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" 
  href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" 
  integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" 
  crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="styles/settings.css">
</head>
<body>
<div class="container" style="margin-top:30px">
	<div class="row" style="padding-left: 0px;">

		<div class="col-sm-6 mx-auto" >

			<h2 class="h2 text-center">Get New Password</h2>
			<div class="box">
			  <form action="forgot-password.php" method="post" name="regform" id="regform">
			    <div class="form-group row">
			      <label for="username" class="col-sm-4 col-form-label">Username:</label>
			      <div class="col-sm-6">
			        <input type="text" class="form-control" id="username" name="username" 
			  	  placeholder="username" maxlength="30" required value="<?php if(isset($username))echo $username ?>">
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
			      <div class="col-sm-6">
			        <input type="email" class="form-control" id="email" name="email" 
			  	  placeholder="E-mail" maxlength="60" required value="<?php if(isset($email))echo $email ?>">
			      </div>
			    </div>
			     <div class="form-group row">
			      <div class="col-sm-4 mx-auto" >
			  	  <input id="" class="btn btn-primary" type="submit" name="gnt_pswd" value="Generate Password">
			      </div>
			    </div>
			    <div class="form-group row">
			      <label for="old_password" class="col-sm-4 col-form-label">Generated Password:</label>
			      <div class="col-sm-6">
			        <input type="text" class="form-control" name="new_password" 
			  	  placeholder="Generated Password" readonly value="<?php if(isset($newPswd))echo $newPswd ?>">
			  	  <span id='message'><?php if(isset($msg)) echo $msg ?></span>
			      </div>
			    </div>
			    <p class='text-center'>Go to <a href="login.php" >Login</a></p>
			  </form>
			</div> <!-- end .box -->

		</div>

	</div>
</div>
<?php include ("myInfo.php")  ?>

</body>
</html>
