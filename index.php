<?php
    session_start();
    if (!isset($_SESSION['login']) || isset($_SESSION['login_error'])){
        if ((!isset($_GET['page']) || $_GET['page'] !== "login") &&  $_GET['page'] !== "register")
            header("Location: ./index.php?page=login");
    }  

    
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        if ($page == 'home')
            if ($_SESSION['login'] == 0)
                include "./pages/home0.php";
            else
                include "./pages/home1.php";
        else if ($page == 'register')
            include "./pages/register.php";
        else if ($page == 'logout')
            include "./pages/logout.php";
        else if ($page == 'login')
            include "./pages/login.php";
        else
            header("Location: ./index.php?page=home");
    }
    else{
        header("Location: ./index.php?page=home");
    }


?>