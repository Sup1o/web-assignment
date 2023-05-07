<!DOCTYPE html>
<html>
<head>
	<title>Search Candidates</title>
	<style>
		label {
			display: block;
			margin: 10px 0;
			font-weight: bold;
		}
		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			box-sizing: border-box;
			border: 2px solid #ccc;
			border-radius: 4px;
		}
		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}
		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Search Candidates</h1>
	<form method="post" action="search.php">
		<label for="degree">Degree:</label>
		<input type="text" name="degree" placeholder="Enter degree...">
		
		<label for="certificate">Certificate:</label>
		<input type="text" name="certificate" placeholder="Enter certificate...">
		
		<label for="skills">Skills:</label>
		<input type="text" name="skills" placeholder="Enter skills...">
		
		<label for="location">Location:</label>
		<input type="text" name="location" placeholder="Enter location...">
		
		<input type="submit" value="Search Candidates">
	</form>
</body>
</html>
