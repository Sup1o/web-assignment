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
    .no-candidates {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: calc(100vh - 70px);
        padding: 20px;
    }
    .no-candidates p {
        height: calc(100vh - 70px);
        font-size: 50px;
        color: red;
    }
    .no-candidates a {
        font-size: 50px;
        color: #00FFFF;
    }
    .employee_page .table .table_element .name{
        font-family: Arial, sans-serif;
        font-size: 50px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    .employee_page .table .table_element .email{
        font-family: Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    .employee_page .table .table_element .phonenumber{
        font-family: Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    .employee_page .table .table_element .position{
        font-family: Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    .employee_page .table .table_element .degrees{
        font-family: Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    .employee_page .table .table_element .skills{
        font-family: Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    .employee_page .table .table_element .certificates{
        font-family: Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    .employee_page .table .table_element .location{
        font-family: Arial, sans-serif;
        font-size: 20px;
        line-height: 1.5;
        color: #333;
        text-align: left;
        letter-spacing: 0.05em;
    }
    </style>
</head>
<<header>
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
    <div class="employee_page" >
            <div class="table" id="TableBody">
            <?php

          // Establish database connection
          $host = "localhost";
          $username = "Kiet";
          $password = "123";
          $dbname = "CVManagement";

          $conn = mysqli_connect($host, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // Retrieve search query from form input
          $degree = isset($_POST['degree']) ? $_POST['degree'] : '';
          $certificate = isset($_POST['certificate']) ? $_POST['certificate'] : '';
          $skills = isset($_POST['skills']) ? $_POST['skills'] : '';
          $location = isset($_POST['location']) ? $_POST['location'] : '';


          // Build SQL query based on search query
          $sql = "SELECT DISTINCT CV.id, CV.position, EMPLOYEE.name, EMPLOYEE.email, EMPLOYEE.phonenumber, EMPLOYEE.id AS employee_id, EMPLOYER.name AS employer_name, EMPLOYER.location, GROUP_CONCAT(CV_DEGREES.degree_name SEPARATOR ', ') AS degrees, GROUP_CONCAT(CV_CERTIFICATES.certificate_name SEPARATOR ', ') AS certificates, GROUP_CONCAT(JOB_REQUIRED_SKILLS.skill_name SEPARATOR ', ') AS skills 
                  FROM CV
                  JOIN EMPLOYEE ON CV.employee_id = EMPLOYEE.id
                  LEFT JOIN CV_DEGREES ON CV.id = CV_DEGREES.cv_id
                  LEFT JOIN CV_CERTIFICATES ON CV.id = CV_CERTIFICATES.cv_id
                  LEFT JOIN CV_EXPERIENCES ON CV.id = CV_EXPERIENCES.cv_id
                  LEFT JOIN JOB_REQUIRED_SKILLS ON CV_EXPERIENCES.job_title = JOB_REQUIRED_SKILLS.job_id
                  LEFT JOIN JOBS ON JOB_REQUIRED_SKILLS.job_id = JOBS.id
                  LEFT JOIN EMPLOYER ON JOBS.employer_id = EMPLOYER.id";

          if (!empty($degree)) {
            $sql .= " WHERE CV_DEGREES.degree_name LIKE '%$degree%'";
          }
          if (!empty($certificate)) {
            if (strpos($sql, 'WHERE') === false) {
              $sql .= " WHERE CV_CERTIFICATES.certificate_name LIKE '%$certificate%'";
            } else {
              $sql .= " AND CV_CERTIFICATES.certificate_name LIKE '%$certificate%'";
            }
          }
          if (!empty($skills)) {
            if (strpos($sql, 'WHERE') === false) {
              $sql .= " WHERE JOB_REQUIRED_SKILLS.skill_name LIKE '%$skills%'";
            } else {
              $sql .= " AND JOB_REQUIRED_SKILLS.skill_name LIKE '%$skills%'";
            }
          }
          if (!empty($location)) {
            if (strpos($sql, 'WHERE') === false) {
              $sql .= " WHERE EMPLOYER.location LIKE '%$location%'";
            } else {
              $sql .= " AND EMPLOYER.location LIKE '%$location%'";
            }
          }

          $sql .= " GROUP BY CV.id";

          // Execute SQL query
          $result = mysqli_query($conn, $sql);

          // Display search results
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<div class=\"table_element\">";
              echo "<p class=\"name\">" . $row['name'] ."</p>";
              echo "<p class=\"email\"> Email :    " . $row['email'] ."</p>";
              echo "<p class=\"phonenumber\"> Phone Number:    " . $row['phonenumber'] ."</p>";
              echo "<p class=\"position\"> Position:   " . $row['position'] ."</p>";
              echo "<p class=\"degrees\"> Degree:   " . $row['degrees'] ."</p>";
              echo "<p class=\"skills\"> Skills:   " . $row['skills'] ."</p>";
              echo "<p class=\"certificates\"> Certificates:   " . $row['certificates'] ."</p>";
              echo "<p class=\"location\"> Location:   " . $row['location'] ."</p>";
              echo "</div>";
            }
          } else {
            echo "<div class=\"no-candidates\">
            <p>No candidates found, please <a href=\"index.php?page=candidate_search\">try again</a></p>
        </div>";
            // echo "<div class='no-candidates' href=\"./index.php?page=search\">try again</div>";
          }

          // Close database connection
          mysqli_close($conn);

          ?>
            </div>
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
    function addRowListeners() {
      const rows = document.querySelectorAll("#TableBody .table_element");
      rows.forEach(row => {
        row.addEventListener("click", () => {
          const name = row.querySelector('.name').textContent;
          window.location.href = `./index.php?page=profile&name=${name}`;
        });
      });
    }
    addRowListeners();
</script>
</html>