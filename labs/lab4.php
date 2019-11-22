<!DOCTYPE html>
<html>
<head>
	<title>ITEC 310 | Lab 4 </title>
</head>
<style type="text/css">
.main-container{
	max-width:900px;
	margin-right:auto;
	margin-left:auto;
	border:2px solid #f9f7f7;
}
.block{
	padding:20px;
	margin-right:auto;
	margin-left:auto;
	text-align: center
}
.block:nth-child(odd){
	background-color:#f9f7f7;
}
h2{color:darkgrey;}

</style>
<body>
<div class="main-container">

<?php 

//EX 1
echo "<div class='block'>";
	echo "<h2> 1</h2>";
	$result = "";
	$a = [2,3,5,6];

	foreach ($a as $x) {
		$x % 2 == 0 ? $result = "Element ".$x."is EVEN</br>": $result = "Element ".$x." is ODD</br>"  ;
		echo $result;
	}
echo "</div>";

//Ex 2
echo "<div class='block'>";
	echo "<h2> 2</h2>";
	$w = ['r','o','t','a','t','o','r','s'];
	$result = "";
	foreach ($w as $x) {
		$result .= $x;
	}
	$reverse = strrev($result);
	echo "The string from array is <b>".$result."</b> and its reverse is <b>". $reverse."<b></br>";
echo "</div>";
//EX 3
/* sample of SORTING array by VALUE: asort()
	$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
	asort($age); //ascending
	arsort($age); //descending

sample of SORTING array by KEY: ksort()
	$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
	ksort($age); //ascending
	krsort($age); // descending
*/
echo "<div class='block' >";
	echo "<h2> 3</h2>";
	$q["a"] = 5;
	$q["b"] = 4;
	$q["c"] = 3;
	$q["d"] = 6;
	$q["e"] = 1;
	$q["z"] = 0;

	//sort desc according to key
	ksort($q);
	foreach ($q as $key => $value) {
		echo $key." =>" .$value."</br>";
	}
echo "</div>";
?>
</div> <!-- end of .main-container -->

</body>
</html>