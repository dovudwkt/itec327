<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php 
if(isset($_POST['login'])){
extract($_POST);

$conn = mysqli_connect("localhost", "root", "", "autos");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// ---------------OOP Method----------------------
$stmt = $conn->stmt_init();
$sql = "SELECT passwrd FROM users where username = ?";

$stmt->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute() or die("Query error: ");
$stmt->store_result();
$stmt->bind_result($pswd);

if ($stmt->num_rows>0)
{
  $stmt->fetch();
  if($passwrd == $pswd){ 
      session_start();
      $_SESSION['user'] = 'logged';
      $url = "menu.php";   
      header('Location: ' . $url);
  }  
}
// ---------------Procedural Method----------------------

// $sql = "SELECT username, passwrd FROM users where username = ?";
//  $q = mysqli_stmt_init($conn);
//  mysqli_stmt_prepare($q, $sql);
//  mysqli_stmt_bind_param($q, "s", $username);
//  mysqli_stmt_execute($q);
//  $result = mysqli_stmt_get_result($q);
//  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
//  if (mysqli_num_rows($result) == 1) {
//    if($passwrd == $row['passwrd']){ 
//      session_start();
//      $_SESSION['user'] = 'logged';
//      $url = "menu.php";   
//      header('Location: ' . $url);
//    }
//  }


}
	
 ?>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
 	User Name: <input type="text" name="username"> <br/>
 	Password: <input type="password" name="passwrd">  <br/>
 	<input type="submit" name="login">
 </form>

</body>
</html>