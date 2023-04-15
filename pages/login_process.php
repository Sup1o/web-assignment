<?php
    session_start();
    $servername = "localhost";
	$db_username = "Kiet";
	$db_password = "123";

    $dbname = "CVManagement";
    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $typ = $_POST['login'];
    $username = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "SELECT * FROM users WHERE Email = '$username'";
    $check = mysqli_query($conn, $sql);
    // echo mysqli_fetch_assoc($check)['Password'];
    // echo password_hash($password, PASSWORD_DEFAULT);
    if ($typ === "Employer"){
        $typ = 1;
    }
    else{
        $typ = 0;
    }
    $row = mysqli_fetch_assoc($check);
    
    if (mysqli_num_rows($check) != 0 && password_verify($password,$row['Password']) && $row['UserType'] == $typ){
        unset($_SESSION['login_error']);
        $_SESSION['login'] = $typ;
        echo 1;
        // session_write_close();
        header("Location: ../index.php?page=home");
        exit();
    }
    else{
        $_SESSION['login_error'] = "1";
        // echo $_SESSION['login_error'];
        // session_write_close();
        header("Location: ../index.php?page=login");
        exit();
    }
?>
