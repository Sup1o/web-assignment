<?php
    if (!$_POST){
        header("Location: ../index.php?page=home");
        exit();
    }
    $servername = "localhost";
	$db_username = "root";
	$db_password = "";

    $dbname = "CVManagement";
    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);
    $typ = $_POST['login'];
    $username = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    if ($typ === "Employer"){
        $typ = 1;
        $sql = "SELECT * FROM employer WHERE email = '$username'";
    }
    else if ($typ === "Employee"){
        $typ = 0;
        $sql = "SELECT * FROM employee WHERE email = '$username'";
    }
    else{
        $_SESSION['login'] = -1;
        header("Location: ../index.php?page=home");
        exit();
    }    
    $check = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($check);
    if (mysqli_num_rows($check) != 0 && password_verify($password,$row['password'])){
        unset($_SESSION['login_error']);
        $_SESSION['login'] = $typ;
        $_SESSION['user_id'] = $row['id'];
        setcookie("user", $email, time() + 60*30, "/");
        // session_write_close();
        header("Location: ./index.php?page=home");
        exit();
    }
    else{
        $_SESSION['login_error'] = "1";
        // echo $_SESSION['login_error'];
        // session_write_close();
        header("Location: ./index.php?page=login");
        exit();
    }
?>
