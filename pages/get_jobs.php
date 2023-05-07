<?php
<<<<<<< HEAD
    $servername = "localhost";
	$db_username = "Kiet";
	$db_password = "123";

    $dbname = "CVManagement";
    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
    if (isset($_GET['name'])){
        $name = $_GET['name'];
        $sql = "SELECT * FROM jobs WHERE name LIKE '%$name%'";
    }
    else{
        $sql = " SELECT * FROM jobs";
    }
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['employer_id'];
        // echo $id;
        $company_sql = "SELECT * FROM EMPLOYER WHERE id = '$id'";
        $company_result = mysqli_query($conn, $company_sql);
        $company = mysqli_fetch_assoc($company_result);
        echo "<div class=\"table_element\">";
        echo "<p class=\"job_name\">" . $row['name'] ."</p>";
        echo "<p class=\"company_name\">" . $company['company_name'] ."</p>";
        echo "</div>";
=======
    $dbname = "CVManagement";
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
>>>>>>> hieu
    }

        // Query to fetch jobs from the database
        $sql = "SELECT j.name, j.salary, j.description, j.employer_id AS CompanyID, e.company_name AS company_name, 
        GROUP_CONCAT(r.skill_name SEPARATOR ', ') AS skills
        FROM JOBS j
        INNER JOIN EMPLOYER e ON j.employer_id = e.id
        LEFT JOIN JOB_REQUIRED_SKILLS r ON j.id = r.job_id
        GROUP BY j.id
        LIMIT 20";
    $result = mysqli_query($conn, $sql);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
    // Loop through each row and display the job details
    while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="table_element">
        <p class="job_name"><?php echo $row['name']; ?></p>
        <p class="company_name"><a href="./pages/company.php?id=<?php echo $row['CompanyID']; ?>"><?php echo $row['company_name']; ?></a></p>
        <p class="salary"><?php echo $row['salary']; ?></p>
        <p class="description"><?php echo $row['description']; ?></p>
        <p class="skill"><?php echo $row['skills']; ?></p>
        </div>
        <?php
    }
    } else {
    echo "No job listings found.";
    }

    // Close the database connection
    mysqli_close($conn);
?>
