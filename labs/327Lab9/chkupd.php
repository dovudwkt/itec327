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


$sth = $cnn->prepare("select * from students where stno=:stno");
$sth->bindParam(':stno', $stno, PDO::PARAM_STR, 10);
$sth->execute();
 
 
if ($sth->rowCount()==0)
{
	echo "There is no record to show with the student number specified as $stno<br/>";
}
else
{
	$row=$sth->fetchAll(PDO::FETCH_ASSOC);

	 echo '<form name="frm2" method="post" action="update.php">';
	 echo 'Student Number:';
	 echo '<input type="text" name="stno" maxlength="6" readonly value="'.$row[0]['stno'].'"> <br/>';
	 echo 'Name          :';
	 echo '<input type="text" name="nm" maxlength="20" value="'.$row[0]['name'].'"> <br/>';
	 echo 'Surname       :';
	 echo '<input type="text" name="snm" maxlength="20" value="'.$row[0]['surname'].'"> <br/>';
	 echo '<input type="reset" value="Reset"><input type="submit" value="Update">';
	 echo '</form>';
}

$cnn=NULL;

?>
<a href="menu.html"> Back to Menu </a>