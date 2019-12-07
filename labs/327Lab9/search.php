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

$qry="select * from students where stno = :stno";
$sth = $cnn->prepare($qry);
$sth->bindParam(':stno', $stno, PDO::PARAM_STR,6);
$sth->execute();

$row=$sth->fetchAll(PDO::FETCH_ASSOC);

if (sizeof($row)==0)
{
	echo "There is no such record to display with the student number specified as $stno<br/>";
}
else
{
	echo '<table border="1">';
	echo '<tr><th>Student Number:</th><td>'.$row[0]['stno'].'</td></tr>';
	echo '<tr><th>Name          :</th><td>'.$row[0]['name'].'</td></tr>';
	echo '<tr><th>Surname       :</th><td>'.$row[0]['surname'].'</td></tr>';
	echo '</table>';		
}
echo '<br/>'.sizeof($row).' record(s) found</br>';

$cnn=null;

?>
<a href="menu.html"> Back to Menu </a>