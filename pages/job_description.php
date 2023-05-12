<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Management Job Info</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
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
        .job-wrapper{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .job{
            width: 50%;
            border: 1px solid black;
            padding: 10px;
            background : white;
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
        .row.my-row >div{
            margin-top: 2%;
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
<?php
    // echo $_SERVER['HTTP_REFERER'];
    if ($_SESSION['login'] == 1){
?>
<header>
    <div class = "logo" >CV MANAGEMENT</div>
    <ul class = "nav" id="list">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href="./index.php?page=candidate_search" title = "CVMangement candidate search">Candidate Search</a>
        </li>
        <li>
            <a href="./index.php?page=create_job" title = "CVMangement create job">Post A Job</a>
        </li>
    </ul>
    <button onclick="myFunction()"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg=="/></button>
    <ul class = "nav" id="profile">
        <li>
            <a href="./index.php?page=profile">Profile</a>
        </li>
        <li>
            <a href="./index.php?page=logout">Log out</a>
        </li>
    </ul>
</header>
<?php
    }
    else if ($_SESSION['login'] == 0){

?>
<header>
    <div class = "logo">CV MANAGEMENT</div>
    <ul class = "nav" id="list">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href = "./index.php?page=find_jobs" title = "CVMangement find jobs page">Find Jobs</a>
            <!-- <i class='bx bx-user' style="font-size: 2rem; color: red;"></i> -->
        </li>
        <li>
            <a href="./index.php?page=create_cv" title = "CVMangement CV page">Create CV</a>
        </li>
    </ul>
    <button onclick="myFunction()"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg=="/></button>
    <ul class = "nav" id="profile">
        <li>
            <a href="./index.php?page=profile">Profile</a>
        </li>
        <li>
            <a href="./index.php?page=logout">Log out</a>
        </li>
    </ul>
</header>
<?php
    }
    else{
?>
<header>
    <div class = "logo">CV MANAGEMENT</div>
    <ul class = "nav" id="list">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href = "./index.php?page=find_jobs" title = "CVMangement find jobs page">Find Jobs</a>
        </li>   
    </ul>
    <button onclick="myFunction()"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg=="/></button>
    <ul class = "nav" id="profile">
        <li>
            <a href="./index.php?page=logout">Log in</a>
        </li>
    </ul>
</header>
<?php
    }
?>
<body style="background: #4FC3F7;">
    <div class="container rounded bg-white mt-5 mb-5 surround">
        <div class="row my-row">
            <h1 id="profile-type" style="margin-top: 5%;">JOB DESCRIPTION</h1>
            <div class="col-md-6 border-right">
                <div class="p-3 py-5" >
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right" style="color: #2196F3;">Company Info</h4>
                    </div>
                    
                    <div class="row mt-3" id="personal">
                        <?php
                        $dbname = "CVManagement";
                        $servername = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $conn = mysqli_connect($servername, $db_username, $db_password, $dbname);
                
                        $company_id = $_GET['company'];
                        $employer_query = "SELECT * FROM EMPLOYER WHERE company_name = '$company_id'";
                        $employer_result = mysqli_query($conn, $employer_query);
                        // $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($employer_result);
                        echo "
                        <div class=\"col-md-12\" >
                            <label class=\"labels\">Company Name</label>
                            <P class=\"info\" id=\"company_name\">${row['company_name']} </P>
                        </div>
                        ";
                        echo "
                        <div class=\"col-md-12\">
                            <label class=\"labels\">Location</label>
                            <P class=\"info\">${row['location']} </P>
                        </div>
                        ";
                        echo "
                        <div class=\"col-md-12\">
                            <label class=\"labels\">Address</label>
                            <P class=\"info\">${row['address']} </P>
                        </div>
                        ";
                        echo "
                        <div class=\"col-md-12\">
                            <label class=\"labels\">Tax Number</label>
                            <P class=\"info\">${row['tax_number']} </P>
                        </div>
                        ";
                        
                        
                        ?>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-5">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h4 class="text-right" style="color: #2196F3;">Job Details</h4>
                    </div>
                    <br>
                    <div>
                    <?php
                        
                        $job_query = "SELECT * FROM JOBS WHERE employer_id = '" . $row["id"] . "' and name = '" . $_GET["job"] . "'";
                        $job_result = mysqli_query($conn, $job_query);
                        // $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($job_result);
                        echo "
                        <div class=\"col-md-12\" >
                            <label class=\"labels\">Job Name</label>
                            <P class=\"info\">${row['name']} </P>
                        </div>
                        ";
                        echo "
                        <div class=\"col-md-12\">
                            <label class=\"labels\">Job salary</label>
                            <P class=\"info\">${row['salary']} USD$</P>
                        </div>
                        ";
                        echo "
                        <div class=\"col-md-12\">
                            <label class=\"labels\">Job description</label>
                            <P class=\"info\">${row['description']} </P>
                        </div>
                        ";
                        // echo "
                        // <div class=\"col-md-12\">
                        //     <label class=\"labels\">Tax Number</label>
                        //     <P class=\"info\">${row['tax_number']} </P>
                        // </div>
                        // ";
                        $skills_query = "SELECT * FROM job_required_skills WHERE job_id = '" . $row["id"] . "'";
                        $skills_result = mysqli_query($conn, $skills_query);
                        $skills = array();
                        while ($skills_row = mysqli_fetch_assoc($skills_result)) {
                            $skills[] = $skills_row["skill_name"];
                        }
                        echo "<div class=\"col-md-12\">";
                        echo "<label class=\"labels\">Job required skills: </label>";
                        echo"<br></br>";
                        echo "<P class=\"info\">";
                        if (count($skills) == 0)
                        echo "None";
                        else
                        echo implode(", ", $skills);
                        echo " </P>";
                        echo "</div>";
                        ?>
                        
                    </div>
                    
                </div>
            </div>

            <div style="display: flex; justify-content: flex-end; margin-bottom:10px; margin-right:10px;">
            <a href="<?php echo $_SERVER['HTTP_REFERER'];?>" class="border px-3 p-1 add-experience"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAI9JREFUSEvt1EsKwCAMBNDMSVtvZm/Sm6UIForYTj50p1tlnklEyM8LP+fLAmiHQy1S1SoiCqAwwQ308K0HV4a4gCG8GQeA/asKMxAJb7AJiIabgEw4BbLhEYC+mnHgdAaTKlwIBdqNMogJyCBmIIq4gAlSALR/6XW5gQdysnD6TNlPadkPVWAJvs8sgHbrAnTpRhk8QpSgAAAAAElFTkSuQmCC"/></a> 
            </div>
        </div>
    </div>

</body>
<footer>
    <div class ="mssv">
        <div class ="name" style="margin-right: auto;">
            <p> Huỳnh Tuấn Kiệt-2052561</p>
            <p> Hoàng Vương Vũ Hoàng-2052477 </p>
            <p> Đặng Quốc Thịnh-1852761 </p>
            <p> Đỗ Hoàng Hiếu-1952678</p>
        </div>
        <div class ="lop">
            <p> Semester: 222 </p>
            <p> CO3050 - Class: CC01 </p>
            <p> Instructor: Nguyễn Đức Thái </p>
        </div>
    </div>
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
