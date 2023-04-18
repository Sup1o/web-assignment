<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./pages/styles.css">
</head>
<body>
    <div class = "form-container" id ="form">
        <form action="./pages/register_processing.php" method ="POST">
            <h3>Register</h3>
            <?php
            // Print type of Error
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-message">'.$error.'</span>';
                };
            };
            ?>

            <input type= "text" name ="username" id="username" placeholder="Enter your name">
            <div id="error1"> error message</div>

            <input type = "email" name = "email" id="email" placeholder ="Enter your email">
            <div id="error2"> error message</div>

            <input type = "text" name="phonenumber" id ="phonenumber" placeholder ="Enter your phone number">
            <div id="error3"> error message</div>

            <input type= "password" name ="password" id="password"  placeholder ="Enter your password">
            <div id ="error4"> error message</div>

            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password">
            <div id ="error5"> error message</div>

            <select name="user_type" id="user_type">
                <option value="Jobseeker"> Jobseeker</option>
                <option value="Company"> Company</option>
            </select>

            <div class ="Company" id = "Company" style="display:none">
                <input type ="companyname" name="companyname" id ="companyname" placeholder ="Enter your company's name">
                <div id ="error6"> error message </div>

                <input type="TAXID" id ="TAXID" placeholder ="Enter your company's TAX">
                <div id = "error7"> error message</div>
                
                <input type="text" id="province" name ="province"placeholder ="Select province" list="provinces">
                <datalist id="provinces">
                    <option value="" selected >Select</option>
                    <option value="Hà Nội">
                    <option value ="Thành phố Hồ Chí Minh">
                    <option value= "An Giang">
                    <option value="Bà Rịa - Vũng Tàu">
                    <option value="Bắc Giang">
                    <option value="Bắc Kạn">
                    <option value="Bạc Liêu">
                    <option value="Bắc Ninh">
                    <option value="Bến Tre">
                    <option value="Bình Định">
                    <option value="Bình Dương">
                    <option value="Bình Phước">
                    <option value="Bình Thuận">
                    <option value="Cà Mau">
                    <option value="Cần Thơ">
                    <option value="Cao Bằng">
                    <option value="Đà Nẵng">
                    <option value="Đắk Lắk">
                    <option value="Đắk Nông">
                    <option value="Điện Biên">
                    <option value="Đồng Nai">
                    <option value="Đồng Tháp">
                    <option value="Gia Lai">
                    <option value="Hà Giang">
                    <option value="Hà Nam">
                    <option value="Hà Tĩnh">
                    <option value="Hải Dương">
                    <option value="Hải Phòng">
                    <option value="Hậu Giang">
                    <option value="Hòa Bình">
                    <option value="Hưng Yên">
                    <option value="Khánh Hòa">
                    <option value="Kiên Giang">
                    <option value="Kon Tum">
                    <option value="Lai Châu">
                    <option value="Lâm Đồng">
                    <option value="Lạng Sơn">
                    <option value="Lào Cai">
                    <option value="Long An">
                    <option value="Nam Định">
                    <option value="Nghệ An">
                    <option value="Ninh Bình">
                    <option value="Ninh Thuận">
                    <option value="Phú Thọ">
                    <option value="Phú Yên">
                    <option value="Quảng Bình">
                    <option value="Quảng Nam">
                    <option value="Quảng Ngãi">
                    <option value="Quảng Ninh">
                    <option value="Quảng Trị">
                    <option value="Sóc Trăng">
                    <option value="Sơn La">
                    <option value="Tây Ninh">
                    <option value="Thái Bình">
                    <option value="Thái Nguyên">
                    <option value="Thanh Hóa">
                    <option value="Thừa Thiên Huế">
                    <option value="Tiền Giang">
                    <option value="Trà Vinh">
                    <option value="Tuyên Quang">
                    <option value="Vĩnh Long">
                    <option value="Vĩnh Phúc">
                    <option value="Yên Bái">
                </datalist>

                <input type="address" id ="address" placeholder ="Enter your company's address">
                <div id = "error8"> error message</div>
            </div>

            <input type="submit" name="submit" value="Register Now" class ="form-btn">
            <p> Already have an account? <a href="index.php">Login now</a></p>
        </form>
    </div>
    
    <script>

    const form = document.querySelector('#form');
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const phonenumber = document.getElementById('phonenumber');
    const password = document.getElementById('password');
    const password2 = document.getElementById('confirm_password');
    
    const error1 = document.querySelector('#error1');
    const error2 = document.querySelector('#error2');
    const error3 = document.querySelector('#error3');
    const error4 = document.querySelector('#error4');
    const error5 = document.querySelector('#error5');
    const error6 = document.querySelector('#error6');
    const error7 = document.querySelector('#error7');
    const error8 = document.querySelector('#error8');
    
    var select = document.getElementById('user_type');
    const companyname = document.getElementById('companyname');
    const taxID = document.getElementById('TAXID');
    const address = document.getElementById('address');
    /*function to process select option*/
    select.addEventListener("change",function(){
        var selectedOption = this.options[this.selectedIndex].value;
        var company = document.getElementById('Company');
        if(selectedOption ==='Company'){
            company.style.display ="block";
        }else{
            company.style.display ="none";
        }
    });
    
    
    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }

    form.addEventListener('submit',e =>{
        e.preventDefault();
        /*General Information */
        namevalue = username.value.trim();
        emailvalue = email.value.trim();
        passwordvalue = password.value.trim(); 
        cfirmvalue = password2.value.trim();
        phonevalue = phonenumber.value.trim();
        
        /*Company's information*/
        companynamevalue = companyname.value.trim();
        taxIDvalue = taxID.value.trim();
        addressvalue = address.value.trim();

        if(namevalue ===''){
            error1.textContent = 'Please enter your name!';
            error1.style.display ='block';
            username.style.border = '2px solid red';
        }else{
            error1.style.display = 'none';
            username.style.border = '2px solid limegreen';
        }
    
        if(emailvalue ===''){
            error2.textContent = 'Please enter your email!';
            error2.style.display ='block';
            email.style.border = '2px solid red';
        }else if(!isEmail(emailvalue)){
            error2.textContent = 'Your email is not valid!';
            error2.style.display = 'block';
            email.style.border ='2px solid red';
        }
        else{
            error2.style.display = 'none';
            email.style.border = '2px solid limegreen';
        }

        if(phonevalue ===''){
            error3.textContent = 'Please enter your phone number!';
            error3.style.display ='block';
            phonenumber.style.border= '2px solid red';
        }else{
            error3.style.display = 'none';
            phonenumber.style.border= '2px solid limegreen';
        }

        if(passwordvalue ===''){
            error4.textContent = 'Please enter your password!';
            error4.style.display ='block';
            password.style.border= '2px solid red';
        }else if( passwordvalue.length < 8){
            error4.textContent ='Your password must have at least 8 characters!';
            error4.style.display ='block';
            password.style.border = '2px solid red';
        }
        else{
            error4.style.display = 'none';
            password.style.border = '2px solid limegreen';
        }

        if(cfirmvalue != passwordvalue || passwordvalue ===''){
            error5.textContent = 'Password not matched';
            error5.style.display ='block';
            password2.style.border = '2px solid red';
        }else{
            error5.style.display = 'none';
            password2.style.border = '2px solid limegreen';
        }

        if(companynamevalue ===''){
            error6.textContent = 'Please enter your company name !';
            error6.style.display ='block';
            username.style.border = '2px solid red';
        }else{
            error6.style.display = 'none';
            username.style.border = '2px solid limegreen';
        }

        if(taxIDvalue ===''){
            error7.textContent = 'Please enter your company TAX number!';
            error7.style.display ='block';
            username.style.border = '2px solid red';
        }else{
            error7.style.display = 'none';
            username.style.border = '2px solid limegreen';
        }

        if(addressvalue ===''){
            error8.textContent = 'Please enter your company address!';
            error8.style.display ='block';
            username.style.border = '2px solid red';
        }else{
            error8.style.display = 'none';
            username.style.border = '2px solid limegreen';
        }


        if( error1.style.display =='none' &&  error2.style.display =='none'
        &&  error3.style.display =='none' &&  error4.style.display =='none'
        &&  error5.style.display =='none' &&  error6.style.display =='none'
        &&  error7.style.display =='none' &&  error8.style.display =='none'){
            form.submit();
        }
    });

    </script>
</body>
</html>