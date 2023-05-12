<?php
$servername = 'localhost';
$db_username = 'root';
$db_password = '';
$dbname = 'CVManagement';
$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);
    $cvQuery = "SELECT * FROM CV";
    if (!$_POST){

    }
    else if ($_POST['degree'][0] == "" && $_POST['certificate_title'][0] == "" && $_POST['skill'][0] == "")
        $cvQuery = "SELECT * FROM CV";
    else if ($_POST['degree'][0] != "" && $_POST['certificate_title'][0] == "" && $_POST['skill'][0] == ""){
        $A = implode("','", $_POST['degree']);
        $cvQuery = "SELECT *
        FROM CV
        INNER JOIN CV_DEGREES ON CV.id = CV_DEGREES.cv_id
        WHERE CV_DEGREES.degree_name IN ('$A')
        GROUP BY CV.id
        HAVING COUNT(DISTINCT CV_DEGREES.degree_name) = " . count($_POST['degree']);
    }
    else if ($_POST['degree'][0] == "" && $_POST['certificate_title'][0] == "" && $_POST['skill'][0] != ""){
        $A = implode("','", $_POST['skill']);
        $cvQuery = "SELECT *
        FROM CV
        INNER JOIN CV_SKILLS ON CV.id = CV_SKILLS.cv_id
        WHERE CV_SKILLS.skills_name IN ('$A')
        GROUP BY CV.id
        HAVING COUNT(DISTINCT CV_SKILLS.skills_name) = " . count($_POST['degree']);
    }
    else if ($_POST['degree'][0] == "" && $_POST['certificate_title'][0] != "" && $_POST['skill'][0] == ""){
        $A = implode("','", $_POST['certificate_title']);
        $cvQuery = "SELECT *
        FROM CV
        INNER JOIN CV_CERTIFICATES ON CV.id = CV_CERTIFICATES.cv_id
        WHERE CV_CERTIFICATES.certificate_name IN ('$A')
        GROUP BY CV.id
        HAVING COUNT(DISTINCT CV_CERTIFICATES.certificate_name) = " . count($_POST['certificate_title']);
    }
    else if ($_POST['degree'][0] != "" && $_POST['certificate_title'][0] != "" && $_POST['skill'][0] == ""){
        $A = implode("','", $_POST['certificate_title']);
        $cer_count = count($_POST['certificate_title']);
        $B = implode("','", $_POST['degree']);
        $cvQuery = "SELECT *
        FROM CV
        INNER JOIN CV_CERTIFICATES ON CV.id = CV_CERTIFICATES.cv_id
        INNER JOIN CV_DEGREES ON CV.id = CV_DEGREES.cv_id
        WHERE CV_CERTIFICATES.certificate_name IN ('$A')
        AND CV_DEGREES.degree_name IN ('$B')
        GROUP BY CV.id
        HAVING COUNT(DISTINCT CV_CERTIFICATES.certificate_name) = ${cer_count}
        AND COUNT(DISTINCT CV_DEGREES.degree_name) = " . count($_POST['degree']);
    }
    else if ($_POST['degree'][0] != "" && $_POST['certificate_title'][0] == "" && $_POST['skill'][0] != ""){
        $A = implode("','", $_POST['skill']);
        $cer_count = count($_POST['skill']);
        $B = implode("','", $_POST['degree']);
        $cvQuery = "SELECT *
        FROM CV
        INNER JOIN CV_SKILLS ON CV.id = CV_SKILLS.cv_id
        INNER JOIN CV_DEGREES ON CV.id = CV_DEGREES.cv_id
        WHERE CV_SKILLS.skills_name IN ('$A')
        AND CV_DEGREES.degree_name IN ('$B')
        GROUP BY CV.id
        HAVING COUNT(DISTINCT CV_SKILLS.skills_name) = ${cer_count}
        AND COUNT(DISTINCT CV_DEGREES.degree_name) = " . count($_POST['degree']);
    }
    else if ($_POST['degree'][0] == "" && $_POST['certificate_title'][0] != "" && $_POST['skill'][0] != ""){
        $A = implode("','", $_POST['certificate_title']);
        $cer_count = count($_POST['certificate_title']);
        $B = implode("','", $_POST['skill']);
        $cvQuery = "SELECT *
        FROM CV
        INNER JOIN CV_SKILLS ON CV.id = CV_SKILLS.cv_id
        INNER JOIN CV_CERTIFICATES ON CV.id = CV_CERTIFICATES.cv_id
        WHERE CV_CERTIFICATES.certificate_name IN ('$A')
        AND CV_SKILLS.skills_name IN ('$B')
        GROUP BY CV.id
        HAVING COUNT(DISTINCT CV_CERTIFICATES.certificate_name) = ${cer_count}
        AND COUNT(DISTINCT CV_SKILLS.skills_name) = " . count($_POST['degree']);
    }
    else{
        $A = implode("','", $_POST['certificate_title']);
        $cer_count = count($_POST['certificate_title']);
        $B = implode("','", $_POST['skill']);
        $skill_count = count($_POST['skill']);
        $C = implode("','", $_POST['degree']);
        $cvQuery = "SELECT *
        FROM CV
        INNER JOIN CV_SKILLS ON CV.id = CV_SKILLS.cv_id
        INNER JOIN CV_CERTIFICATES ON CV.id = CV_CERTIFICATES.cv_id
        INNER JOIN CV_DEGREES ON CV.id = CV_DEGREES.cv_id
        WHERE CV_CERTIFICATES.certificate_name IN ('$A')
        AND CV_SKILLS.skills_name IN ('$B')
        AND CV_DEGREES.degree_name IN ('$C') 
        GROUP BY CV.id
        HAVING COUNT(DISTINCT CV_CERTIFICATES.certificate_name) = ${cer_count}
        AND COUNT(DISTINCT CV_SKILLS.skills_name) = ${skill_count}
        AND COUNT(DISTINCT CV_DEGREES.degree_name) = " . count($_POST['degree']);
    }
    $result = mysqli_query($conn, $cvQuery);
    
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV Management Candidates</title>
    <link rel="stylesheet" href="./pages/styles.css">
</head>
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
<body>
    <div class="job_page" >
            
            <div class="table" id="TableBody">
                <?php

                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['employee_id'];
                        $employee_sql =  "SELECT * FROM EMPLOYEE WHERE id = '$id'";
                        $employee_result = mysqli_query($conn, $employee_sql);
                        $employee = mysqli_fetch_assoc($employee_result);
                        echo "<div class=\"table_element\">";
                        echo "<p class=\"job_name\">" . $employee['name'] ."</p>";
                        echo "<p class=\"company_name\">#" . $row['id'] ."</p>";
                        echo "</div>";
                    }
                
                ?>
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

        if (window.innerWidth <= 650 && show.style.display == 'block'){
            lst.style.display = 'none';
            // button.style.margin-right = 'auto';
        }
        else{
            lst.style.display = 'block';
        }
    }
    // const TableBody = document.getElementById("TableBody");
    // const SearchInput = document.getElementById("SearchInput");
    // function LoadTable(){
    //     const xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState === 4 && this.status === 200) {
    //             TableBody.innerHTML = this.responseText;
    //             addRowListeners();
    //         }
    //     };
    //     xhttp.open("GET", "./index.php?page=get_jobs");
    //     xhttp.send();
    // }
    
    // function up(){
    //     const xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function() {
    //         if (this.readyState == 4 && this.status == 200) {
    //             TableBody.innerHTML = this.responseText;
    //             addRowListeners();
    //         }
    //     };
    //     if (SearchInput.value === ''){
    //         LoadTable();
    //     }
    //     else{
    //         xhttp.open("GET", "./index.php?page=get_jobs&name=" + SearchInput.value, true);
    //         xhttp.send();
    //     }
    // }
    function addRowListeners() {
      const rows = document.querySelectorAll("#TableBody .table_element");
      rows.forEach(row => {
        row.addEventListener("click", () => {
          const company = row.querySelector('.company_name').textContent.slice(1);
          const jobName = row.querySelector('.job_name').textContent;
          window.location.href = `./index.php?page=cv&id=${company}`;
        });
      });
    }
    addRowListeners();
    // SearchInput.addEventListener("keyup",up);
    // LoadTable()
</script>
</html>