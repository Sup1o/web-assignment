
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
    <div class = "logo" >CV MANAGEMENT</div>
    <ul class = "nav" id="list">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href="#" title = "CVMangement candidate search">Candidate Search</a>
        </li>
    </ul>
    <button onclick="myFunction()"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg=="/></button>
    <ul class = "nav" id="profile">
        <li>
            <a href="./index.php?page=company">Profile</a>
        </li>
        <li>
            <a href="./index.php?page=logout">Log out</a>
        </li>
    </ul>
</header>
<body>
<h1>Search Candidates</h1>
	<form method="post" action="./index.php?page=search">
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

<script>
    function myFunction() {
        const show = document.getElementById('profile');
        const lst = document.getElementById('list');
        const button = document.querySelector('header button');
        if (!show.style.display || show.style.display == 'none')
            show.style.display = 'block';
        else
            show.style.display = 'none';

        if (window.innerWidth <= 650 && show.style.display == 'block'){
            lst.style.display = 'none';
            // button.style.margin-right = 'auto';
        }
        else{
            lst.style.display = 'block';
        }
    }
</script>
</html>