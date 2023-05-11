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
              echo "<p class=\"email\">" . $row['email'] ."</p>";
              echo "<p class=\"phonenumber\">" . $row['phonenumber'] ."</p>";
              echo "<p class=\"position\">" . $row['position'] ."</p>";
              echo "<p class=\"degrees\">" . $row['degrees'] ."</p>";
              echo "<p class=\"skills\">" . $row['skills'] ."</p>";
              echo "<p class=\"certificates\">" . $row['certificates'] ."</p>";
              echo "<p class=\"location\">" . $row['location'] ."</p>";
              echo "</div>";
            }
          } else {
            echo "No candidates found.";
          }

          // Close database connection
          mysqli_close($conn);

          ?>