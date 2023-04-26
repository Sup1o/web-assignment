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
		.company {
            border: 1px solid black;
            padding: 10px;
            margin-bottom: 10px;
            display: grid;
            grid-template-columns: 335px 335px;
            grid-template-rows: repeat(auto);
            grid-gap: 10px;
        }

        .company h2 {
            margin-top: 0;
            grid-column: 1 / span 2;
        }

        .company p {
            margin: 0;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
	</style>
	<link rel="stylesheet" href="./pages/styles.css">
</head>
<header>
    <div class = "logo">CV MANAGEMENT</div>
    <ul class = "nav">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href = "./index.php?page=find_jobs" title = "CVMangement find jobs page">Find Jobs</a>
        </li>
        <li>
            <a href="./index.php?page=create_cv" title = "CVMangement CV page">Create CV</a>
        </li>
    </ul>
    <button onclick="myFunction()">Log out</button>
</header>
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
