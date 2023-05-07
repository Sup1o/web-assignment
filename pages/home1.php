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
    <div class = "logo" >CV MANAGEMENT</div>
    <ul class = "nav">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href="./index.php?page=candidate_search" title = "CVMangement candidate search">Candidate Search</a>
        </li>
    </ul>
    <button onclick="myFunction()">Log out</button>
</header>
<body>
<div class="home_container">
<h1>Welcome to CV Management site</h1>
        <p>hello jobseekers!</p>
        <p>Welcome to our job management platform. You can use this site to find job listings, create your CV, and apply for jobs. We wish you the best of luck in your job search!</p>
</div>
</body>


<script>
    function myFunction() {
        window.location.href = "./index.php?page=logout";
    }
</script>
</html>