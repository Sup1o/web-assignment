<?php
$conn = mysqli_connect('localhost','root','','user_db');

if(isset($_POST['submit'])){
    // Get data
    $name = mysqli_real_escape_string($conn,$_POST['username']);
    $pass  = md5($_POST['password']);
    $confirm_password = md5($_POST['confirm_password']);
    $user_type = $_POST['user_type'];

    $select = "SELECT username FROM user_form Where username = '$name'"; // checking data
    $result = mysqli_query($conn,$select);

    // if result != 0 -> exist 
    if(mysqli_num_rows($result) > 0 ){
        $error[] = 'User already exist!';
    }else{
        if($pass != $confirm_password){
            $error[] = 'Password not matched!';
        }else{
            //Push to database
            $insert = "INSERT INTO user_form(username,password,user_type) 
            VALUES('$name','$pass','$user_type')";

            mysqli_query($conn,$insert);
            header('location:index.php');
        };
    };
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pages/style.css">
</head>
<body>
    <div class = "form-container" id ="form">
        <form action="" method ="POST">
            <h3>Register</h3>
            <?php
            // Print type of Error
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-message">'.$error.'</span>';
                };
            };
            ?>
            <input type= "email" name ="username" id="username"  placeholder="Enter your email">
            <div id="error1"> error message</div>

            <input type= "password" name ="password" id="password"  placeholder ="Enter your password">
            <div id ="error2"> error message</div>

            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password">
            <div id ="error3"> error message</div>

            <select name="user_type">
                <option value="Jobseeker">Jobseeker</option>
                <option value="Company"> Company</option>
            </select>
            <input type="submit" name="submit" value="register now" class ="form-btn">
            <p> Already have an account? <a href="index.php">Login now</a></p>
        </form>
    </div>
    
    <script>
    const form = document.querySelector('#form');
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const password2 = document.getElementById('confirm_password');
        
    const error1 = document.querySelector('#error1');
    const error2 = document.querySelector('#error2');
    const error3 = document.querySelector('#error3');

    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }

    form.addEventListener('submit',e =>{
        e.preventDefault();
        Usernamevalue = username.value.trim();
        Passwordvalue = password.value.trim();
        Password2value = password2.value.trim();
        if(Usernamevalue === ''){
            error1.textContent = 'Please enter your email !';
            error1.style.display = 'block';
            username.style.borderBottom = '1px solid red';
        }else if(!isEmail(Usernamevalue)){
            error1.textContent = 'Your email is not a valid email';
            error1.style.display = 'block';
            username.style.borderBottom = '1px solid red';
        }else{
            error1.style.display = 'none';
            username.style.border = '1px solid #green';
        }

        if (PasswordValue === ''){
            error2.textContent = 'Please enter your password!';
            error2.style.display = 'block';
            password.style.borderBottom = '1px solid red';
        }else if (PasswordValue.length < 8){
            error2.textContent = 'Your password must have at least 8 characters!';
            error2.style.display = 'block';
            password.style.borderBottom = '1px solid red';
        }else{
            error2.style.display = 'none';
            password.style.borderBottom = '1px solid #a7bcff';
        }

        if(Password2value != Passwordvalue){
            error3.textContent = 'Password not matched!';
            error3.style.display = 'block';
            password2.style.borderBottom = '1px solid red';
        }else{
            error3.style.display = 'none';
            password2.style.borderBottom = '1px solid #a7bcff';
        }

        if (error1.style.display === 'none' && error2.style.display === 'none' && error3.style.display ==='none' ) {
            form.submit();
        }

    })

    </script>
</body>
</html>