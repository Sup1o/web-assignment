<?php
    //testing to get the inputs
    // session_start();
    $servername = "localhost";
	$db_username = "Kiet";
	$db_password = "123";

    $dbname = "CVManagement";
    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
    $typ = $_POST['user_type'];

    $error = 0;
    $email = $_POST['email'];
    $name = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $password = $_POST['password'];
    $companyname = $_POST['companyname'];
    $TAXID = $_POST['TAXID'];
    $province = $_POST['province'];
    $address = $_POST['address'];

    $email = mysqli_real_escape_string($conn, $email);
    $name = mysqli_real_escape_string($conn, $name);
    $password = mysqli_real_escape_string($conn, $password);
    $password = password_hash($password, PASSWORD_DEFAULT);
    $phonenumber = mysqli_real_escape_string($conn, $phonenumber);
    $companyname = mysqli_real_escape_string($conn, $companyname);
    $TAXID = mysqli_real_escape_string($conn, $TAXID);
    $province = mysqli_real_escape_string($conn, $province);
    $address = mysqli_real_escape_string($conn, $address);


    $check = mysqli_query($conn, "SELECT * FROM employee WHERE email = '$email'");
    $check2 = mysqli_query($conn, "SELECT * FROM employer WHERE email = '$email'");
    if (mysqli_num_rows($check) != 0 || mysqli_num_rows($check2) != 0){
        $error = 1;
        
        $_SESSION['inputs'] = $_POST;
        header("Location: ../index.php?page=register");
        exit();
    }
    if (isset($_SESSION['inputs'])){
        unset($_SESSION['inputs']);
    }
    if ($typ === "Jobseeker"){
        $id = randomID();
        $check = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$id'");
        while(mysqli_num_rows($check) != 0){
            $id = randomID();
            $check = mysqli_query($conn, "SELECT * FROM employee WHERE id = '$id'");
        }
        $sql = "INSERT INTO EMPLOYEE (id, name, email, password, phonenumber) VALUES ('$id', '$name', '$email', '$password', '$phonenumber')";
        mysqli_query($conn, $sql);
        header("Location: ../index.php?page=home");
        exit();
    }
    else{
        $id = randomID();
        $check = mysqli_query($conn, "SELECT * FROM employer WHERE id = '$id'");
        while(mysqli_num_rows($check) != 0){
            $id = randomID();
            $check = mysqli_query($conn, "SELECT * FROM employer WHERE id = '$id'");
        }
        $sql = "INSERT INTO EMPLOYER (id, name, email, password, phonenumber, company_name, tax_number, location, address) VALUES ('$id', '$name', '$email', '$password', '$phonenumber', '$companyname', '$TAXID', '$province', '$address')";
        mysqli_query($conn, $sql);
        header("Location: ../index.php?page=home");
        exit();
    }
    // echo $error;


    function randomID(){
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $result = '';
        for ($i = 0;$i < 6;$i++){
            $result .= $char[rand(0,strlen($char)-1)];
        }
        return $result;
    }
?>