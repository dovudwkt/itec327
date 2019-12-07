<?php
$stno=$_POST['stno'];

//1. connect
 $dsn = 'mysql:dbname=school;host=localhost';
 $user = 'schooluser';
 $password = 'schoolpass';

try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


$qry="delete from students where stno=:stno";
$sth = $cnn->prepare($qry);
$sth->bindParam(':stno', $stno, PDO::PARAM_STR,6);
$sth->execute();


if ($sth->rowCount()==0)
{
	echo "There is no record to delete with the student number specified as $stno<br/>";
}
else
{
 	echo "The record for student with number $stno is deleted<br/>";
}

$cnn=null;

?>
<a href="menu.html"> Back to Menu </a>