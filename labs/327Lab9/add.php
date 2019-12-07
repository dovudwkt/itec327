<?php
$stno=trim($_POST['stno']);
$nm=trim($_POST['nm']);
$snm=trim($_POST['snm']);

// check the contents

if ((strlen($stno)==0) || (strlen($nm)==0) ||(strlen($snm)==0))
{
 echo "Student number, name and surname can not be left as blank";
}
else
{
  $dsn = 'mysql:dbname=school;host=localhost';
  $user = 'schooluser';
  $password = 'schoolpass';
 //1. connect

try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

// $cnn=mysqli_connect('localhost','schooluser','schoolpass','school');

  $stmt = $cnn->prepare("select * from students where stno='$stno' ");
  $stmt->execute(); 
  if($stmt->rowCount()>0){
    echo "Student id $stno already exists!";
  }
  else{    
    $sth = $cnn->prepare('insert into students(stno,name,surname) values(:stno,:nm,:snm)');
    $sth->bindParam(':stno', $stno, PDO::PARAM_STR,6);
    $sth->bindParam(':nm', $nm, PDO::PARAM_STR, 20);
    $sth->bindParam(':snm', $snm, PDO::PARAM_STR, 20);
    $sth->execute();
    if ($sth->rowCount()>0){
      echo "The record for student with number $stno is added to our database<br/>";
    }
    else{
      echo "Failed!";
    }

  }
   
  
  $cnn=NULL;
}

?>
<br/><a href="menu.html"> Back to Menu </a>