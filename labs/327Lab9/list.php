<?php
//1. connect
 $dsn = 'mysql:dbname=school;host=localhost';
 $user = 'schooluser';
 $password = 'schoolpass';

// Check connection
try {
    $cnn = new PDO($dsn, $user, $password);
    $cnn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

//3. prepare & run query
$sth = $cnn->prepare('select * from students order by stno');
$sth->execute();

$row=$sth->fetchAll(PDO::FETCH_ASSOC);

// $qry='select * from students order by stno';
// $res=mysqli_query($cnn,$qry) or die('Query failed. '.mysqli_error($cnn));
	
	
if ($sth->rowCount() > 0){
	echo '<table border="1">';
	echo '<tr><th>Student Number</th><th>Name</th><th>Surname</th></tr>';
	foreach ($row as $rec){
		echo '<tr>';
		echo '<td>'.$rec['stno'].'</td>';
	    echo '<td>'.$rec['name'].'</td>';
	    echo '<td>'.$rec['surname'].'</td>';
		echo '</tr>';
	}
	echo '</table>';

}else{
	echo 'There is no records to display';
}

//5. close connection
echo sizeof($row).' record(s) found</br>';
$cnn=null;


?>
<a href="menu.html"> Back to Menu </a>