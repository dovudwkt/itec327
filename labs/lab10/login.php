<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<?php 
if(isset($_POST['login'])){
// extract($_POST);
$username = $_POST['username'];
$passwrd = $_POST['passwrd'];

$conn = mysqli_connect("localhost", "root", "", "autos");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// ---------------Procedural Method----------------------

 $stmt = mysqli_stmt_init($conn);
$sql = "SELECT username, passwrd FROM users where username = ?";
 mysqli_stmt_prepare($stmt, $sql);
 mysqli_stmt_bind_param($stmt, "s", $username);
 mysqli_stmt_execute($stmt);
 $result = mysqli_stmt_get_result($stmt);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
 if (mysqli_num_rows($result) == 1) {
   if($passwrd == $row['passwrd']){ 
     session_start();
     $_SESSION['user'] = 'logged';
     $url = "menu.php";   
     header('Location: ' . $url);
   }
 }



// ---------------OOP Method----------------------
// $stmt = $conn->stmt_init();
// $sql = "SELECT passwrd FROM users where username = ?";

// $stmt->prepare($sql);
// $stmt->bind_param('s', $username);
// $stmt->execute() or die("Query error: ");
// $stmt->store_result();
// $stmt->bind_result($pswd);

// if ($stmt->num_rows>0)
// {
//   $stmt->fetch();
//   if($passwrd == $pswd){ 
//       session_start();
//       $_SESSION['user'] = 'logged';
//       $url = "menu.php";   
//       header('Location: ' . $url);
//   }  
// }


//-----------Primtitve vesrion------------
// $stmt = mysqli_stmt_init($conn);
// $sql = "SELECT * FROM users where username = ? AND passwrd = ?";
// mysqli_stmt_prepare($stmt, $sql);
// mysqli_stmt_bind_param($stmt, 'ss', $username, $passwrd);
// mysqli_stmt_execute($stmt);
// $result = mysqli_stmt_get_result($stmt);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// if(mysqli_num_rows($result)>0){
//     session_start();
//     $_SESSION['user'] = 'logged';
//     $url = "menu.php";   
//     header('Location: ' . $url);
// }else{
//   echo "failed! Password or username is incorrect";
// }



}
	
 ?>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
 	User Name: <input type="text" name="username"> <br/>
 	Password: <input type="password" name="passwrd">  <br/>
 	<input type="submit" name="login">
 </form>

</body>
</html>