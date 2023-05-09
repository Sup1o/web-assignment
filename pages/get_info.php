<!-- <div class="col-md-12">
    <label class="labels">Name</label>
    <P class="info">Huỳnh Tuấn Kiệt</P>
</div>
<div class="col-md-12">
    <label class="labels">Email address</label>
    <P class="info">a@email.com</P>
</div>
<div class="col-md-12">
    <label class="labels">Phone Number</label>
    <P class="info">090909090909</P>
</div> -->
<?php

    $servername = "localhost";
	$db_username = "root";
	$db_password = "";

    $dbname = "CVManagement";
    $conn =  mysqli_connect($servername,$db_username,$db_password,$dbname);
    if ($_SESSION['login'] == 0){
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM employee WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "
        <div class=\"col-md-12\">
            <label class=\"labels\">Name</label>
            <P class=\"info\">${row['name']} </P>
        </div>
        ";
        echo "
        <div class=\"col-md-12\">
            <label class=\"labels\">Email address</label>
            <P class=\"info\">${row['email']} </P>
        </div>
        ";
        echo "
        <div class=\"col-md-12\">
            <label class=\"labels\">Phone Number</label>
            <P class=\"info\">${row['phonenumber']} </P>
        </div>
        ";
    }
    else{
        $id = $_SESSION['user_id'];
        $sql = "SELECT * FROM employer WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo "
        <div class=\"col-md-12\">
            <label class=\"labels\">Name</label>
            <P class=\"info\">${row['name']} </P>
        </div>
        ";
        echo "
        <div class=\"col-md-12\">
            <label class=\"labels\">Email address</label>
            <P class=\"info\">${row['email']} </P>
        </div>
        ";
        echo "
        <div class=\"col-md-12\">
            <label class=\"labels\">Phone Number</label>
            <P class=\"info\">${row['phonenumber']} </P>
        </div>
        ";
    }
?>