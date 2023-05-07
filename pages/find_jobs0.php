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
    <ul class = "nav">
        <li>
            <a href="./index.php?page=home" title = "CVMangement home page">Home</a>
        </li>
        <li>
            <a href = "./index.php?page=find_jobs" title = "CVMangement find jobs page">Find Jobs</a>
        </li>
        <li>
            <a href="#" title = "CVMangement CV page">Create CV</a>
        </li>
    </ul>
    <button onclick="myFunction()">Log out</button>
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
    
</footer>
<script>
    function myFunction() {
        window.location.href = "../index.php?page=logout";
    }
    const TableBody = document.getElementById("TableBody");
    const SearchInput = document.getElementById("SearchInput");
    function LoadTable(){
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                TableBody.innerHTML = this.responseText;
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
    SearchInput.addEventListener("keyup",up);
    LoadTable()
</script>
</html>