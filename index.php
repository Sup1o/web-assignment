<?php
session_start();
if (!isset($_SESSION['login']) || isset($_SESSION['login_error'])) {
    if (
        (!isset($_GET['page']) || $_GET['page'] !== 'login') &&
        $_GET['page'] !== 'register' &&
        $_GET['page'] !== 'register_processing'
    ) {
        header('Location: ./index.php?page=login');
    }
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == 'logout') {
        include './pages/logout.php';
    } elseif ($page == 'login') {
        include './pages/login.php';
    } elseif ($page == 'register') {
        include './pages/register.php';
    } elseif ($page == 'register_processing') {
        include './pages/register_processing.php';
    } elseif ($page == 'login_process') {
        include './pages/login_process.php';
    } elseif ($page == 'create_cv') {
        include './pages/create_cv.php';
    } elseif ($page == 'submit_cv') {
        include './pages/submit_cv.php';
    } elseif ($page == 'employer') {
        include '/pages/employer.php';
    } elseif ($_SESSION['login'] == 0) {
        if ($page == 'home') {
            include './pages/home0.php';
        } elseif ($page == 'find_jobs') {
            include './pages/find_jobs0.php';
        } else {
            include './pages/home0.php';
        }
    } elseif ($_SESSION['login'] == 1) {
        if ($page == 'home') {
            include './pages/home1.php';
        } else {
            include './pages/home1.php';
        }
    } elseif ($_SESSION['login'] == -1) {
        if ($page == 'home') {
            include './pages/home-1.php';
        } elseif ($page == 'find_jobs-1') {
            include './pages/find_jobs-1.php';
        }else {
            include './pages/home-1.php';
        }
    } else {
        header('Location: ./index.php?page=home');
    }
} else {
    header('Location: ./index.php?page=home');
}

// if(isset($_GET['page'])){
//     $page = $_GET['page'];
//     if ($page == 'home')
//         if ($_SESSION['login'] == 0)
//             include "./pages/home0.php";
//         else if ($_SESSION['login'] == 1)
//             include "./pages/home1.php";
//         else
//             include "./pages/home-1.php";
//     else if ($page == 'register')
//         include "./pages/register.php";
//     else if ($page == 'logout')
//         include "./pages/logout.php";
//     else if ($page == 'login')
//         include "./pages/login.php";
//     else
//         header("Location: ./index.php?page=home");
// }
// else{
//     header("Location: ./index.php?page=home");
// }

?>
