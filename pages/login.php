<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CVManagement Login</title>
    <link rel="stylesheet" href="./pages/styles.css">
    <style>
        #choose{
            display: block;
        }
        #input{
            display: none;
        }
        .line {
          border-bottom: 1px solid #000;
          /* background-color: black; */
          height: 100%;
          margin: 0 20px;
        }
        .formContainer .formWrapper .title {
            position: relative;
            top: -10px;
            padding: 0 12%;
            color: red;
        }
        @media (max-width:650px){
            header .logo{
                display: block; 
                margin-left: auto;
            }
            header{
                justify-content: center; 
            }
        }
        
    </style>
</head>
<header>
    <div class = "logo">CV MANAGEMENT</div>
</header>
<body>
    <div class="formContainer">
        <div class="formWrapper" id="choose">
            <span class="logo">CV MANAGEMENT</span>
            <form action="">
                <?php
                    if (isset($_SESSION['login_error']))   {
                        echo "<span class=\"title\"> Incorrect username	or	password! </span>";
                    }
                ?>
                <button id = 'choose1'>Login as Employers</button>

                <button id = 'choose2'>Login as Employees</button>

                <button id = 'choose3'>Login as Guests</button>

                <div class="line"> </div>
                <button type = "button" id = "a" style="position: relative; bottom: -50px;"  >Register</button>
            </form>
            
        </div>
        <div class="formWrapper" id="input">
            <span class="logo">CV MANAGEMENT</span>
            
            <form action="./index.php?page=login_process" method="POST">
                <input type="email" placeholder="Email" id = "username" name = "email">
                <div id="error1">error message</div>
                <input type="password" placeholder="Password" id = "password" name = "password">
                <div id="error2">error message</div>
                <button type="submit">Login</button>
                <input type="hidden" name="login" id = "login_type">
                
                <div class="line"> </div>
                <!-- <button style="position: relative; bottom: -50px;">Back</button> -->
                <button style="position: relative;" id = "b">Register</button>
            </form>

            
        </div>
    </div>
    <script>

        
        const form = document.querySelector('#input form');
        const username = document.querySelector('#username');
        const password = document.querySelector('#password');
        const error1 = document.querySelector('#error1');
        const error2 = document.querySelector('#error2');
        const choosetable = document.getElementById('choose')
        const choosetable1 = document.getElementById('choose1')
        const choosetable2 = document.getElementById('choose2')

        const logintable = document.getElementById('input')
        const logintype = document.getElementById('login_type')
        function validEmail(email){
            return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
        }
        function myFunction() {
            // alert("Button clicked");
            window.location.href = "./index.php?page=register";
        }
        document.getElementById("a").addEventListener("click", myFunction);
        document.getElementById("b").addEventListener("click", myFunction);
        choosetable1.addEventListener('click', e =>{
            e.preventDefault(); 
            choosetable.style.display = 'none';
            logintable.style.display = 'block';
            logintype.value = 'Employer';
        })
        choosetable2.addEventListener('click', e =>{
            e.preventDefault(); 
            choosetable.style.display = 'none';
            logintable.style.display = 'block';
            logintype.value = 'Employee';
        })

        document.getElementById("choose3").addEventListener("click", e=>{
            e.preventDefault(); 
            logintype.value = 'Guest';
            form.submit()
        }
        )
        form.addEventListener('submit', e => {
        	e.preventDefault(); 
            UsernameValue = username.value.trim();
            PasswordValue = password.value.trim();
            if (UsernameValue === ''){
                error1.textContent = 'Please enter your email!';
                error1.style.display = 'block';
                username.style.borderBottom = '1px solid red';
            }
            else if (!validEmail(UsernameValue)){
                error1.textContent = 'Your email is not a valid email!';
                error1.style.display = 'block';
                username.style.borderBottom = '1px solid red';
            }
            else{
                error1.style.display = 'none';
                username.style.borderBottom = '1px solid #a7bcff';
            }
            if (PasswordValue === ''){
                error2.textContent = 'Please enter your password!';
                error2.style.display = 'block';
                password.style.borderBottom = '1px solid red';
            }
            else if (PasswordValue.length < 8){
                error2.textContent = 'Your password must have at least 8 characters!';
                error2.style.display = 'block';
                password.style.borderBottom = '1px solid red';
            }
            else{
                error2.style.display = 'none';
                password.style.borderBottom = '1px solid #a7bcff';
            }
            if (error1.style.display === 'none' && error2.style.display === 'none') {
                form.submit();
            }
            
        });
    </script>
</body>

</html>