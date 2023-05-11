<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pages/styles.css">
    <title>EMPLOYER Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./pages/styles.css">
    <style>
        .row.my-row >div{
            margin-top: 2.5%;
        }
    </style>
</head>
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
            <a href="./index.php?page=company">Profile</a>
        </li>
        <li>
            <a href="./index.php?page=logout">Log out</a>
        </li>
    </ul>
</header>
<body style="background: #4FC3F7;">
    <div class="container rounded bg-white mt-5 mb-5 surround">

        <div class="row my-row">

            <div class="col-md-4 border-right" >
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <h1 id="profile-type">EMPLOYER</h1>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-4 border-right" >
                <div class="p-3 py-5" >
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right" style="color: #2196F3;">Profile</h4>
                    </div>

                    <div class="row mt-3" id="personal">

                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience">
                        <h4 class="text-right" style="color: #2196F3;">Posted Jobs</h4>
                        <a href="./index.php?page=create_job" class="border px-3 p-1 add-experience"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAFxJREFUSEtjZKAxYKSx+QyjFhAMYZKC6P////9BJjIyMhKtj2iFIINHLSAYYUMniGAuJeglNAXYUhfWVERzC3C5fOjEwagPkENgcJVFpOYLcMlLjiZS9IxaQDC0AFaEOBlExtG1AAAAAElFTkSuQmCC"/></a>

                    </div>
                    <br>
                    <div  class="cvs" id="cvs">


                    </div>

                </div>
            </div>
        </div>
    </div>
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
    const TableBody = document.getElementById('personal');
    function LoadInfo(){
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                TableBody.innerHTML = this.responseText;
                // addRowListeners();
            }
        };
        xhttp.open("GET", "./index.php?page=get_info");
        xhttp.send();
    }
    let btnClicked = false;
    
    function LoadCVs(){
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById('cvs').innerHTML = this.responseText;
                
                const btns = document.querySelectorAll('.btn-get-value');
                btns.forEach(btn => {
                  btn.addEventListener('click', () => {
                    const h4 = btn.parentNode.querySelector('h4');
                    const value = h4.textContent;
                    const xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                      if (this.readyState === 4 && this.status === 200) {
                        document.getElementById('cvs').innerHTML = this.responseText;
                        LoadCVs();
                      }
                    };
                    btnClicked = true;
                    xhttp.open("GET", "./index.php?page=get_profile_job&del="+encodeURIComponent(value));
                    xhttp.send();
                  });
                });
                addRowListeners();
                
            }
        };
        
        xhttp.open("GET", "./index.php?page=get_profile_job");
        xhttp.send();
    }
    function myFunction() {
        const show = document.getElementById('profile');
        const lst = document.getElementById('list');
        const button = document.querySelector('header button');
        if (!show.style.display || show.style.display == 'none')
            show.style.display = 'block';
        else
            show.style.display = 'none';

        if (window.innerWidth <= 650 && show.style.display == 'block'){
            lst.style.display = 'none';
            // button.style.margin-right = 'auto';
        }
        else{
            lst.style.display = 'block';
        }
    }
    function addRowListeners() {
      const company = document.querySelector("#company_name").textContent;
      const rows = document.querySelectorAll("#cvs .inside");
        rows.forEach(row => {
        row.addEventListener("click", () => {   
            if (btnClicked) btnClicked = false;
            else{
                const jobName = row.querySelector('.text-right').textContent;
                window.location.href = `./index.php?page=job&company=${company}&job=${jobName}`;
            }
        });

        
      });
    }
    LoadInfo();
    LoadCVs();
</script>
</html>