<!DOCTYPE html>
<html>
<head>
	<title>ITEC 310 | Lab 4 </title>
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
td{
	padding:20px;
	margin:10px;
	border:3px solid #f3f3f3 ;
}
</style>
</head>
<body>
<div class="main-container">
	<div class="block">
		<h2>Exercise 1 (a): Factorial</h2>
		<?php 
			$num = 6;
			echo 'Factorial of '. $num .' is ' . factorial($num);
		?>;
	</div>
	<div class="block">
		<h2>Exercise 1 (b): Recursive Factorial</h2>
		<?php 
			$num = 4;
			echo "Factorial of $num is " . recFact($num) 
		?>;	
	</div>
	<div class="block">
		<h2>Exercise 2: sum of even numbers</h2>
		<?php 
			$n = 10;
			echo "Sum of even numbers between 0 and ".$n." is ".  sumEvens($n);
		?>
	</div>
	<div class="block">
		<h2>Exercise 3: Character counter</h2>
		<table class="block" style="border-collapse: collapse;">
			<tr>
				<?php
					$myStr = "Hello";
					echo "<td>" .$myStr."</td>";
					// echo "<td>". countCharacters($myStr) . "</td>";
				?>
				<td>
					<?php
						echo countCharacters($myStr);
					?>	
				</td>
			</tr>
		</table>
	</div>
</div>
<?php  
//ex1 a -------------------------
function factorial($n){
	$result = 1;
	for($i=1; $i<=$n; $i++){
		$result *=$i;
	}
	return $result;
}
//ex1 b -------------------------
function recFact($n){
	if($n==0){
		return 1;
	}
	else{
		return $n * recFact($n-1);
	}
}
//ex2 -------------------------
function sumEvens($n){
	if($n==0)
		return 0;
	else
		return $n + sumEvens($n-2);		
}
//ex3 -------------------------
function countCharacters($str){
	$str = strtolower($str);
	$letters = ["a"=>0,"b"=>0,"c"=>0,"d"=>0,"e"=>0,"f"=>0,"g"=>0,"h"=>0,"i"=>0,"j"=>0,"k"=>0,"l"=>0,"m"=>0,"n"=>0,"o"=>0,"p"=>0,"q"=>0,"r"=>0,"s"=>0,"t"=>0,"u"=>0,"v"=>0,"w"=>0,"x"=>0,"y"=>0,"z"=>0];

	for($i=0;$i < strlen($str);$i++) {
		if($str[$i] != " ")
			$letters[$str[$i]]++ ;
	}
	foreach ($letters as $key => $value) {
		if($letters[$key] > 0)
		 	echo $key . ":" . $value.'</br>';
	}
	// for($i=0;$i < strlen($str);$i++) {
	// 	echo $str[$i].":". $letters[$str[$i]]."</br>";
	// }
}

?>

</body>
</html>