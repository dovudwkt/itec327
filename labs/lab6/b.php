<?php 

if(isset($_POST['search']) ){
	$database = $_POST['database'];
	$numRecords = $_POST['numRecords'];
	$full_or_brief = $_POST['full_or_brief'];
	$word1 = $_POST['word1'];
	$word1_option = $_POST['word1_option'];
	$word2 = $_POST['word2'];
	$word2_option = $_POST['word2_option'];
	$word3 = $_POST['word3'];
	$word3_option = $_POST['word3_option'];
	$and_or = $_POST['bool'];

	echo "Your search from \"<strong> ".$database."</strong>\" which was a \"<strong>".$full_or_brief. "</strong>\" search with \"<strong>".$numRecords."</strong>\" records per sheet where the search criteria is: <strong>". $word1_option."=".$word1." ". $and_or." ". $word2_option."=".$word2." ". $and_or." ".$word3_option."=".$word3."</strong> could not find any results.";

}else{
	echo "ERROR";
}


 ?>