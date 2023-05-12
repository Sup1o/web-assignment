<?php
    $servername = "localhost";
	$db_username = "root";
	$db_password = "";

    $dbname = "CVManagement";
    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
    
    // echo strip_tags($_POST['job_name']);
    // echo $_POST['salary'];
    // for ($i=0; $i<count($_POST['skills']);$i++)
    //     echo $_POST['skills'][$i];
    // echo strip_tags($_POST['description']);
    $job_name = $_POST['job_name'];
    $salary = $_POST['salary'];
    $desctiption = $_POST['description'];
    $job_name = strip_tags($job_name);
    $salary = strip_tags($salary);
    $desctiption = strip_tags($desctiption);

    $user_id = $_SESSION['user_id'];
    // echo $job_name = mysqli_real_escape_string($conn, $job_name);
    // echo $salary = mysqli_real_escape_string($conn, $salary);
    // echo $desctiption = mysqli_real_escape_string($conn, $desctiption);
    // echo $user_id;

    $id = randomID();
    $check = mysqli_query($conn, "SELECT * FROM jobs WHERE id = '$id'");
    while(mysqli_num_rows($check) != 0){
        $id = randomID();
        $check = mysqli_query($conn, "SELECT * FROM jobs WHERE id = '$id'");
    }
    $sql = "INSERT INTO JOBS (id, employer_id, name, salary, description) 
    VALUES ('$id', '$user_id', '$job_name', ${salary}, '$desctiption');
    ";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        
    }
    for ($i=0; $i<count($_POST['skills']);$i++){
        $name = $_POST['skills'][$i];
        $name = strip_tags($name);
        $name =  mysqli_real_escape_string($conn, $name);
        $sql = "INSERT INTO JOB_REQUIRED_SKILLS (job_id, skill_name) 
        VALUES ('$id', '$name');";
        try {
            mysqli_query($conn, $sql);
        } catch (mysqli_sql_exception $e) {
            // echo $e;
        }
    }
    header("Location: ./index.php?page=create_job");
    exit();
    function randomID(){
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        for ($i = 0;$i < 10;$i++){
            $result .= $char[rand(0,strlen($char)-1)];
        }
        return $result;
    }
?>