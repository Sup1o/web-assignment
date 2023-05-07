<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYER Page</title>
    <style>
        @font-face {
        font-family: 'Montserrat';
        src: url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
        }

        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
        overflow-x: hidden;
        }

        /* css for header and footer */
        header {
        position: relative;
        left: 0px;
        top: 0px;
        width: 100vw;
        height: 10vh;
        background-color: #24252A;
        display: flex;
        align-items: center;
        padding: 0 2.5vw;
        box-sizing: border-box;
        justify-content: flex-end;
        }

        footer {
        position: relative;
        width: 100vw;
        height: 10vh;
        background-color: #24252A;
        display: flex;
        align-items: center;
        padding: 0 2.5vw;
        justify-content: center;
        }

        header .logo {
        color: white;
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        font-family: 'Montserrat', sans-serif;
        margin-right: auto;
        }

        nav {
        list-style: none;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        }

        nav li {
        margin-right: 30px;
        }

        nav li:last-child {
        margin-right: 0;
        }

        nav li a {
        font-family: 'Montserrat', sans-serif;
        color: white;
        text-decoration: none;
        font-weight: 400;
        font-size: 16px;
        border: none;
        outline: none;
        transition: all 0.3s ease 0s;
        }

        nav li a:hover {
        color: #37a3fa;
        }

        header button {
        /* width: 6vw; */
        cursor: pointer;
        padding: 9px 25px;
        background-color: #006ac0;
        border-radius: 30px;
        transition: all 0.3s ease 0s;
        }

        header button:hover {
        background-color: #37a3fa;
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
    <h1>Employer Page</h1>
    <?php
    $dbname = "CVManagement";
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $conn =  mysqli_connect($servername, $db_username, $db_password, $dbname);
    
    $company_id = $_GET['id'];
    $employer_query = "SELECT * FROM EMPLOYER WHERE id = '$company_id'";
    $employer_result = mysqli_query($conn, $employer_query);

    if (mysqli_num_rows($employer_result) > 0) {

        while ($employer_row = mysqli_fetch_assoc($employer_result)) {
            echo "<div class='company'>";
            echo "<h2> Company name : " . $employer_row["company_name"] . "</h2>";
            echo "<p> location : " . $employer_row["location"] . "</p>";
            echo "<p> phone number : " . $employer_row["phonenumber"] . "</p>";
            echo "<p> email : " . $employer_row["email"] . "</p>";
            echo "<p> tax number : " . $employer_row["tax_number"] . "</p>";
            echo "<p> address : " . $employer_row["address"] . "</p>";
            echo "</div>";
            $job_query = "SELECT * FROM JOBS WHERE employer_id = '" . $employer_row["id"] . "'";
            $job_result = mysqli_query($conn, $job_query);
            echo "<br></br>";
        }
    }

    mysqli_close($conn);
    ?>
</body>

</html>