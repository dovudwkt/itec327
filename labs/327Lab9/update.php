<?php

$stno=$_POST['stno'];
$nm=$_POST['nm'];
$snm=$_POST['snm'];

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


$sth = $cnn->prepare("update students set name=:nm,surname=:snm where stno=:stno");
$sth->bindParam(':stno', $stno, PDO::PARAM_STR, 6);
$sth->bindParam(':nm', $nm, PDO::PARAM_STR,20);
$sth->bindParam(':snm', $snm, PDO::PARAM_STR, 20);
$sth->execute();

if ($sth->rowCount()==0)
{
	echo "There is no such record to update with the student number specified as $stno. Meantime the record is deleted by another user. You did not change any value<br/>";
}
else
{
 	echo "The record for student with number $stno is updated<br/>";
}
$cnn=null;

?>
<a href="menu.html"> Back to Menu </a>