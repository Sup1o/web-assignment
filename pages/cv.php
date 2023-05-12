<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CV Management CV info</title>
  <link rel="stylesheet" href="./pages/styles.css">
  <style>
    body {
      background-color: #4FC3F7;
      font-family: Arial, sans-serif;
    }

    form {
      width: 60%;
      /* min-width: 500px; */
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      margin-top: 20px;
      margin-bottom: 10px;
    }

    input[type="text"],
    textarea {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      margin-bottom: 10px;
    }

    button[type="button"] {
      display: block;
      padding: 10px;
      margin-bottom: 20px;
      background-color: #2196F3;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"] {
      display: block;
      padding: 10px;
      margin-top: 20px;
      background-color: #2196F3;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }

    .degree,
    .certificate,
    .experience,
    .work,
    .reference {
      margin-bottom: 20px;
      border: 1px solid #ddd;
      padding: 10px;
      border-radius: 5px;
    }

    .degree input[type="text"],
    .certificate input[type="text"],
    .experience input[type="text"],
    .work input[type="text"],
    .reference input[type="text"] {
      width: calc(33.33% - 10px);
      margin-right: 10px;
    }

    .certificate input[type="text"],
    .certificate input[type="date"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .experience input[type="text"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .work input[type="text"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .reference input[type="text"] {
      width: calc(25% - 10px);
      margin-right: 10px;
    }

    .reference input[type="email"] {
      width: calc(33.33% - 10px);
      margin-right: 10px;
    }
    p{
        margin-top: 2%;
        font-size: 20px;
    }
    #profile-type{
        margin-bottom: 30px;
        font-size: 2.5vw;
    }
    @media (max-width: 650px) {
        #profile-type{
            font-size: 30px;
        }
      .degree input[type="text"],
      .certificate input[type="text"],
      .experience input[type="text"],
      .work input[type="text"],
      .reference input[type="text"],
      .reference input[type="email"],
      .certificate input[type="date"] {
        width: 100%;
        margin-right: 0;
      }

      form {
        width: 95%;
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

<body>
  
  <form style="padding: 5% 10%;">
    <h1 id="profile-type" >CV Information</h1>
    <h2>Employee's Name</h2>
    <!-- <p>helllllllllllloooooooooooooooooooooooo</p> -->
    <?php
        $servername = "localhost";
        $db_username = "root";
        $db_password = "";

        $dbname = "CVManagement";
        $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
        $sql = "SELECT * FROM CV WHERE ID = {$_GET['id']}";
        $result = mysqli_query($conn, $sql);
        $cv = mysqli_fetch_assoc($result);
        $sql = "SELECT * FROM employee WHERE ID = '{$cv['employee_id']}'";
        $result = mysqli_query($conn, $sql);
        $employee = mysqli_fetch_assoc($result);
        echo "<p>${employee['name']}</p>";
        echo "<h2>Email</h2>";
        echo "<p>${employee['email']}</p>";
        echo "<h2>Phone Number</h2>";
        echo "<p>${employee['phonenumber']}</p>";
        echo "<h2>Expected Position</h2>";
        echo "<p>${cv['position']}</p>";
        echo "<h2>Degrees</h2>";
        $sql = "SELECT * FROM cv_degrees WHERE cv_id = '{$cv['id']}'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0)
            echo "<p>None</p>";
        while($row = mysqli_fetch_assoc($result)){
            if ($row['degree_name'] == ""){
                echo "<p>None</p>";
                break;
            }
            echo "<div class=\"degree\">
                <p>Certificate: ${row['degree_name']}</p>
                <p>Organization: ${row['school_name']}</p>
                <p>Obtained Date: ${row['date_obtained']}</p>
            </div>";
        }
        $sql = "SELECT * FROM cv_certificates WHERE cv_id = '{$cv['id']}'";
        $result = mysqli_query($conn, $sql);
        echo "<h2>Certifications</h2>";
        if (mysqli_num_rows($result) == 0)
            echo "<p>None</p>";
        while($row = mysqli_fetch_assoc($result)){
            if ($row['certificate_name'] == ""){
                echo "<p>None</p>";
                break;
            }
            echo "<div class=\"degree\">
                <p>Certificate: ${row['certificate_name']}</p>
                <p>Organization: ${row['issuing_organization']}</p>
                <p>Obtained Date: ${row['date_obtained']}</p>
                <p>Expiration Date: ${row['expiration_date']}</p>
            </div>";
        }
        
        $sql = "SELECT * FROM cv_experiences WHERE cv_id = '{$cv['id']}'";
        $result = mysqli_query($conn, $sql);
        echo "<h2>Experience</h2>";
        if (mysqli_num_rows($result) == 0)
            echo "<p>None</p>";
        while($row = mysqli_fetch_assoc($result)){
            if ($row['job_title'] == ""){
                echo "<p>None</p>";
                break;
            }
            echo "<div class=\"degree\">
                <p>Certificate: ${row['job_title']}</p>
                <p>Organization: ${row['company_name']}</p>
                <p>Obtained Date: ${row['description']}</p>
            </div>";
        }
        $sql = "SELECT * FROM cv_skills WHERE cv_id = '{$cv['id']}'";
        $result = mysqli_query($conn, $sql);
        echo "<h2>Skill</h2>";
        if (mysqli_num_rows($result) == 0)
            echo "<p>None</p>";
        while($row = mysqli_fetch_assoc($result)){
            if ($row['skills_name'] == ""){
                echo "<p>None</p>";
                break;
            }
            echo "<div class=\"degree\">
                <p>${row['skills_name']}</p>
            </div>";
        }
        $sql = "SELECT * FROM cv_references WHERE cv_id = '{$cv['id']}'";
        $result = mysqli_query($conn, $sql);
        echo "<h2>Reference</h2>";
        if (mysqli_num_rows($result) == 0)
            echo "<p>None</p>";
        while($row = mysqli_fetch_assoc($result)){
            if ($row['name'] == ""){
                echo "<p>None</p>";
                break;
            }
            echo "<div class=\"degree\">
                <p>Name: ${row['name']}</p>
                <p>Relationship: ${row['relationship']}</p>
                <p>Phome Number: ${row['phone_number']}</p>
                <p>Email: ${row['email']}</p>
            </div>";
        }
        echo "<h2>Additional Information</h2>";
        echo "<p>${cv['additional_information']}</p>";
    ?>

    <div style="margin-top:5%;">
        <button type="button" onclick="back()" >Go Back</button>
    </div>
</form>

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
    function back(){
        window.location.href = "<?php echo $_SERVER['HTTP_REFERER'];?>";
    }

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