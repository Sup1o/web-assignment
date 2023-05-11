<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pages/styles.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>


    <style>
        a,
        ul {
            list-style: none;
            text-decoration: none;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        h3 {
            color: #fff;
        }

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

        .company-wrapper>h1 {
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

        .job-title {
            position: absolute;
            left: 20px;
            top: 10px;
        }

        .job-right {
            position: absolute;
            right: 20px;
            top: 10px;
        }

        .job-salary {
            top: 30px;
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
    <div class="rounded mt-5 mb-5 surround" style="background: #4FC3F7">
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
                echo "<h2> Company name : <i>" . $employer_row["company_name"] . "</i></h2>";
                echo "<p> Location : <i>" . $employer_row["location"] . "</p>";
                echo "<p> Phone number : <i>" . $employer_row["phonenumber"] . "</i></p>";
                echo "<p> Email : <i>" . $employer_row["email"] . "</p>";
                echo "<p> Tax number : <i>" . $employer_row["tax_number"] . "</i></p>";
                echo "<p> Address : <i>" . $employer_row["address"] . "</i></p>";
                echo "</div>";
                echo "<br></br>";

                echo "<div class='job-wrapper'>";
                $job_query = "SELECT * FROM JOBS WHERE employer_id = '" . $employer_row["id"] . "' and name = '" . $_GET["job"] . "'";
                $job_result = mysqli_query($conn, $job_query);
                echo "<h3>Job list</h3>:";
                while ($job_row = mysqli_fetch_assoc($job_result)) {
                    echo "<div class='job'>";
                    echo "<i class='job-title'>" . $job_row["name"] . "</i>";
                    echo "<i class='job-right'>" . $job_row["id"] . "</i>";
                    echo "<i class='job-right job-salary'>" . $job_row["salary"] . "</i>";
                    echo "<ul class='job-list'>";
                    echo "<li class='job-item'> Job description : " . $job_row["description"] . "</li>";
                    echo "<li class='job-item'> Job required skills: ";
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
                echo "</div>";
                echo "<br></br>";
                echo "<style>
        .job-wrapper{

        }
        .job{
            width: 100%;
            border-radius: 20px;
            border: 1px solid #fff;
            padding: 10px;
            background: #fff;
            position: relative;
            padding-top: 2rem;
        }
        .job-list{
            list-style-type: none;
        }
        .job-item{
            margin-left: 20px;
        }
        .job-item:first-of-type {
            margin-top: 10px;
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