<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pages/styles.css">
</head>
<header>
    <div class = "logo">CV MANAGEMENT</div>
    <ul class = "nav">
        <li>
            <a href="./index.php?page=home">Home</a>
        </li>
        <li>
            <a href = "./index.php?page=find_jobs-1" title = "CVMangement find jobs page">Find Jobs</a>
        </li>
        
    </ul>
    <button onclick="myFunction()">Log in</button>
</header>
<body>
    home page for Guests!
</body>
<script>
    function myFunction() {
        window.location.href = "./index.php?page=logout";
    }
</script>
</html>