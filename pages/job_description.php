<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pages/styles.css">
    <style>
        .job-list li {
            color: #000;
        }

        .job-list li a {
            color: #000;
        }


        .company-wrapper>h1 {
            color: #fff;
            margin-right: 100px;
        }

        .company {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
        }

        .company h2 {
            font-size: 24px;
            margin-bottom: 10px;
            width: 100%;
        }

        .company p {
            font-size: 16px;
            margin-bottom: 5px;
            color: #666;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .company-wrapper {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #2ecc71;
            border-radius: 20px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            width: 100%;
            text-align: center;
        }

        .company {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .company h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .company p {
            font-size: 16px;
            margin-bottom: 5px;
            color: #666;
        }

        @media screen and (max-width: 767px) {
            .company-wrapper {
                padding: 10px;
            }

            h1 {
                font-size: 24px;
                margin-bottom: 10px;
            }

            .company {
                margin-bottom: 10px;
                padding: 10px;
            }

            .company h2 {
                font-size: 20px;
                margin-bottom: 5px;
            }

            .company p {
                font-size: 14px;
                margin-bottom: 3px;
            }
        }
    </style>
</head>
<header>
    <div class="logo">CV MANAGEMENT</div>
    <ul class="nav" id="list">
        <li>
            <a href="./index.php?page=home" title="CVMangement home page">Home</a>
        </li>
        <li>
            <a href="./index.php?page=find_jobs" title="CVMangement find jobs page">Find Jobs</a>
            <!-- <i class='bx bx-user' style="font-size: 2rem; color: red;"></i> -->
        </li>
        <li>
            <a href="./index.php?page=create_cv" title="CVMangement CV page">Create CV</a>
        </li>
    </ul>
    <button onclick="myFunction()"><img
            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg==" /></button>
    <ul class="nav" id="profile">
        <li>
            <a href="./index.php?page=profile">Profile</a>
        </li>
        <li>
            <a href="./index.php?page=logout">Log out</a>
        </li>
    </ul>
</header>

<body style="background: #4FC3F7">
    <div class="container rounded bg-white mt-5 mb-5 surround">
        <?php
        // job description demo
        $dbname = "CVManagement";
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";
        $conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

        $company_id = $_GET['company'];
        $employer_query = "SELECT * FROM EMPLOYER WHERE company_name = '$company_id'";
        $employer_result = mysqli_query($conn, $employer_query);

        if (mysqli_num_rows($employer_result) > 0) {

            while ($employer_row = mysqli_fetch_assoc($employer_result)) {
                $id = $employer_row["id"];
                echo "<div class='company-wrapper'>";
                echo "<h1>Company Profile</h1>";
                echo "<div class='company'>";
                echo "<h2> Company name : " . $employer_row["company_name"] . "</h2>";
                echo "<p> location : " . $employer_row["location"] . "</p>";
                echo "<p> phone number : " . $employer_row["phonenumber"] . "</p>";
                echo "<p> email : " . $employer_row["email"] . "</p>";
                echo "<p> tax number : " . $employer_row["tax_number"] . "</p>";
                echo "<p> address : " . $employer_row["address"] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "<br></br>";

                echo "<div class='job-wrapper'>";
                $job_query = "SELECT * FROM JOBS WHERE employer_id = '" . $employer_row["id"] . "' and name = '" . $_GET["job"] . "'";
                $job_result = mysqli_query($conn, $job_query);
                while ($job_row = mysqli_fetch_assoc($job_result)) {
                    echo "<div class='job'>";
                    echo "<h3>Job Details</h3>";
                    echo "<ul class='job-list'>";
                    echo "<li class='job-item'> Job id : " . $job_row["id"] . "</li>";
                    echo "<li class='job-item'> Job name : " . $job_row["name"] . "</li>";
                    echo "<li class='job-item'> Job description : " . $job_row["description"] . "</li>";
                    echo "<li class='job-item'> Job salary : " . $job_row["salary"] . "</li>";
                    echo "<li> Job required skills: ";
                    echo "<a class='skills'>";
                    $skills_query = "SELECT * FROM job_required_skills WHERE job_id = '" . $job_row["id"] . "'";
                    $skills_result = mysqli_query($conn, $skills_query);
                    $skills = array();
                    while ($skills_row = mysqli_fetch_assoc($skills_result)) {
                        $skills[] = $skills_row["skill_name"];
                    }
                    echo implode(", ", $skills);
                    echo "</a>";
                    echo "</li>";
                    echo "</ul>";
                    echo "</div>";

                }
                echo "</div>";
                echo "<br></br>";
                echo "<style>
        .job-wrapper{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .job{
            width: 50%;
            border: 1px solid black;
            padding: 10px;
        }
        .job-list{
            list-style-type: none;
        }
        .job-item{
            margin-bottom: 10px;
        }
        .skills{
            text-decoration: none;
            color: blue;
        }
        .skills:hover{
            text-decoration: underline;
        }

                </style>";
            }
            // echo $id;
            // $job_query = "SELECT * FROM EMPLOYER WHERE company_name = '$company_id'"
        }

        mysqli_close($conn);
        ?>
    </div>
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

        if (window.innerWidth <= 650 && show.style.display == 'block') {
            lst.style.display = 'none';
            // button.style.margin-right = 'auto';
        }
        else {
            lst.style.display = 'block';
        }
    }
</script>

</html>