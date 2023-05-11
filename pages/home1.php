<!DOCTYPE html>
<html>
<head>
	<title>Search Candidates</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Document</title> -->
	<link rel="stylesheet" href="./pages/styles.css">
</head>
<header>
    <div class = "logo" >CV MANAGEMENT</div>
    <ul class = "nav" id="list">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href="./index.php?page=candidate_search" title = "CVMangement candidate search">Candidate Search</a>
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
<body style="height: 10000px;">
<div class="home_container" >
<h1>Welcome to CV Management site</h1>
        <p>hello jobseekers!</p>
        <p>Welcome to our job management platform. You can use this site to find job listings, create your CV, and apply for jobs. We wish you the best of luck in your job search!</p>
</div>
</body>
<footer>

</footer>

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