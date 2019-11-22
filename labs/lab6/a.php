<!DOCTYPE html>
<html>
<head>
	<title>lab 6(a)</title>
</head>
<body>
<div class="main-container">
	<h1>INFOSHARE Database Query Page</h1>
	<p><strong>Search</strong></p>
	<p>NOTE: Words <strong>must</strong> be filled in sequentioal order.</p>
	<form action="b.php" method="post">
		<label for='database'>Database:</label>	
		<select name="database" >
			<option value="WHUM Humanities Index" selected>WHUM Humanities Index</option>
			<option value="WGSI General Science">WGSI General Science</option>
			<option value="WSSI Social Science">WSSI Social Science</option>
			<option value=">WBAI Biology and Agriculture">WBAI Biology and Agriculture</option>
			<option value="WAST Applied Science and Technology">WAST Applied Science and Technology</option>
			<option value="WRGA Reader's Guide Abstracts">WRGA Reader's Guide Abstracts</option>
		</select><br/><br/>
		<label for="numRecords">Records to View:</label>
		<input type="number" value="1" min='1' max='1000'  name="numRecords">

		<label>Full or Brief displays:</label>
		<select name="full_or_brief">
			<option value="full" selected>F</option>
			<option value="brief">B</option>
		</select><br/><br/>
		
		<label for="word1">Word 1:</label>
		<input type="text" name="word1" id="word1" value=''> 
		<select name='word1_option'>
			<option value="Author" selected>Author</option>
			<option value="Subject">Subject</option>
			<option value="Title">Title</option>
		</select><br/><br/>

		<label for="word2">Word 2:</label>
		<input type="text" name="word2" id="word2" value=''> 
		<select name='word2_option'>
			<option value="Author" >Author</option>
			<option value="Subject" selected>Subject</option>
			<option value="Title">Title</option>
		</select><br/><br/>

		<label for="word3">Word 3:</label>
		<input type="text" name="word3" id="word3" value=''> 
		<select name='word3_option'>
			<option value="Author" >Author</option>
			<option value="Subject">Subject</option>
			<option value="Title" selected>Title</option>
		</select><br/><br/>

		<input type="radio" name="bool" id="and" value="AND">
		<label for="and">AND</label>
		<input type="radio" name="bool" id="or" value="OR">
		<label for="or">OR</label><br/><br/>
		<hr/>
		<input type="reset" name="clear" value="clear">
		<input type="submit" name="search" value="Do Search">


	</form>

</div>		
</body>
</html>