<?php
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
    }




?>