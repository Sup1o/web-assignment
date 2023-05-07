<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pages/styles.css">
    <style>
.home_container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 70px);
        padding: 20px;
    }

    h1 {
        font-size: 40px;
        color: #2ecc71;
        margin-bottom: 20px;
    }

    p {
        font-size: 20px;
        text-align: center;
        line-height: 1.5;
        color: #555;
        max-width: 800px;
    }
        </style>
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
<div class="home_container">
<h1>Hello, jobseeker!</h1>
        <p>Welcome to our job management platform. You can use this site to find job listings, create your CV, and apply for jobs. We wish you the best of luck in your job search!</p>
</div>
</body>
<script>
    function myFunction() {
        window.location.href = "../index.php?page=logout";
    }
</script>
</html>