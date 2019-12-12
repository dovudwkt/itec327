<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php 
if(isset($_POST['login'])){
extract($_POST);

// Create connection
$conn = mysqli_connect("localhost", "root", "", "autos");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT username, passwrd FROM users where username = ?";
 $q = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($q, $sql);
      mysqli_stmt_bind_param($q, "s", $username);
      mysqli_stmt_execute($q);
      $result = mysqli_stmt_get_result($q);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        if (mysqli_num_rows($result) == 1) {

          // if (password_verify($pswd, $row['passwrd'])) {                         //#2
              if($passwrd == $row['passwrd']){ 
                 session_start();
                 // $_SESSION['current_user'] =  $rowAssoc['user_id'];
                 $_SESSION['user'] = 'logged';
                 $_SESSION['username'] = $row['username'];

              $url = "menu.php";   
              header('Location: ' . $url);
          }

// $conn->close();
}
}
	
 ?>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
 	User Name: <input type="text" name="username"> <br/>
 	Password: <input type="password" name="passwrd">  <br/>
 	<input type="submit" name="login">
 </form>

</body>
</html>