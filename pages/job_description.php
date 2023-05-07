<?php
    // job description demo
    $dbname = "CVManagement";
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $conn =  mysqli_connect($servername, $db_username, $db_password, $dbname);
    
    $company_id = $_GET['company'];
    $employer_query = "SELECT * FROM EMPLOYER WHERE company_name = '$company_id'";
    $employer_result = mysqli_query($conn, $employer_query);

    if (mysqli_num_rows($employer_result) > 0) {

        while ($employer_row = mysqli_fetch_assoc($employer_result)) {
            $id = $employer_row["id"];
            echo "<div class='company'>";
            echo "<h2> Company name : " . $employer_row["company_name"] . "</h2>";
            echo "<p> location : " . $employer_row["location"] . "</p>";
            echo "<p> phone number : " . $employer_row["phonenumber"] . "</p>";
            echo "<p> email : " . $employer_row["email"] . "</p>";
            echo "<p> tax number : " . $employer_row["tax_number"] . "</p>";
            echo "<p> address : " . $employer_row["address"] . "</p>";
            echo "</div>";
            echo "<br></br>";
            $job_query = "SELECT * FROM JOBS WHERE employer_id = '" . $employer_row["id"] . "' and name = '". $_GET["job"]."'";
            $job_result = mysqli_query($conn, $job_query);
            while($job_row = mysqli_fetch_assoc($job_result)){
                echo "<p>" . $job_row["id"] . "</p>";
                echo "<p>" . $job_row["name"] . "</p>";
                echo "<p>" . $job_row["salary"] . "</p>";
                echo "<p>" . $job_row["description"] . "</p>";
                $skills_query = "SELECT * FROM job_required_skills WHERE job_id = '". $job_row["id"] ."'";
                $skills_result = mysqli_query($conn, $skills_query);
                while ($skills_row = mysqli_fetch_assoc($skills_result)){
                    echo "<p>" . $skills_row["skill_name"] . "</p>";
                }
            }
            echo "<br></br>";
        }
        // echo $id;
        // $job_query = "SELECT * FROM EMPLOYER WHERE company_name = '$company_id'"
    }

    mysqli_close($conn);
?>