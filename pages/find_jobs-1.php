<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./pages/styles.css">
</head>
<header>
    <div class = "logo">CV MANAGEMENT</div>
    <ul class = "nav" id="list">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href = "./index.php?page=find_jobs" title = "CVMangement find jobs page">Find Jobs</a>
        </li>   
    </ul>
    <button onclick="myFunction()"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAQtJREFUSEvNlNFxwkAMRN9WACUkFSSUQAdJB0kFKSGmAoYKKAFKSAl0kJSQVCBGjM3gs33yGJugH33ceZ9O8kpMHJpYn14AM3sGPgHPHgdgJclzNkKAmb0Auw6VV0n7HCELMLM58A14botf4FGS59aIALnqK8GlpK+hgKLsfa4LPgu/d58v8N7/ALOOAv+Ah8EzcNFJ/6Kq6tIH3udLHxSj+CAyUnQeGi0SiM47AaXJPgD3QtWaVM9XhTt50zXoVoCZvQHrjINTkDv5vW1tNACl+DZ6et/dVAP02D0Rt7GbUkCf1RBBaqsjBfjQniKF4PwgaVHdSQF2pfjpc0ln3dsCxqg+1fg/J4/1miOvUlsZTgKRSgAAAABJRU5ErkJggg=="/></button>
    <ul class = "nav" id="profile">
        <li>
            <a href="./index.php?page=logout">Log in</a>
        </li>
    </ul>
</header>
<body>
    <div class="job_page" >
            <div class="search">
                <input type="text" id="SearchInput" placeholder="search for companies or job positions">
            </div>
            
            <div class="table" id="TableBody">

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
    const TableBody = document.getElementById("TableBody");
    const SearchInput = document.getElementById("SearchInput");
    function LoadTable(){
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                TableBody.innerHTML = this.responseText;
                addRowListeners();
            }
        };
        xhttp.open("GET", "./index.php?page=get_jobs");
        xhttp.send();
    }
    
    function up(){
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                TableBody.innerHTML = this.responseText;
                addRowListeners();
            }
        };
        if (SearchInput.value === ''){
            LoadTable();
        }
        else{
            xhttp.open("GET", "./index.php?page=get_jobs&name=" + SearchInput.value, true);
            xhttp.send();
        }
    }
    function addRowListeners() {
      const rows = document.querySelectorAll("#TableBody .table_element");
      rows.forEach(row => {
        row.addEventListener("click", () => {
          const company = row.querySelector('.company_name').textContent;
          const jobName = row.querySelector('.job_name').textContent;
          window.location.href = `./index.php?page=job&company=${company}&job=${jobName}`;
        });
      });
    }
    SearchInput.addEventListener("keyup",up);
    LoadTable()
</script>
</html>