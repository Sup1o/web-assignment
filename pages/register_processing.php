<?php
$servername = 'localhost';
$db_username = 'root';
$db_password = '';
$dbname = 'CVManagement';
$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
    exit();
}

// Define error array
$error = [];

// Get user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string(
    $conn,
    $_POST['confirm_password']
);
$user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

// Validate input
if (empty($username)) {
    $error[] = 'Name is required';
}

if (empty($email)) {
    $error[] = 'Email is required';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = 'Invalid email format';
} elseif (emailExists($conn, $email)) {
    $error[] = 'Email already exists';
}

if (empty($phone)) {
    $error[] = 'Phone number is required';
} elseif (!preg_match('/^[0-9]{10,11}$/', $phone)) {
    $error[] = 'Invalid phone number format';
}

if (empty($password)) {
    $error[] = 'Password is required';
} elseif (strlen($password) < 6) {
    $error[] = 'Password must be at least 6 characters long';
}

if ($password != $confirm_password) {
    $error[] = 'Passwords do not match';
}

// Insert user into database if there are no errors
if (count($error) == 0) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    if ($user_type == 'Jobseeker') {
        $sql = "INSERT INTO employee (name, email, phonenumber, password) VALUES ('$username', '$email', '$phone', '$hashed_password')";
    } else {
        $sql = "INSERT INTO employer (name, email, phonenumber, password) VALUES ('$username', '$email', '$phone', '$hashed_password')";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION['register_success'] = true;
        header('Location: index.php?page=login');
        exit();
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
} else {
    $_SESSION['register_error'] = $error;
    header('Location: index.php?page=register');
    exit();
}

mysqli_close($conn);

// Function to check if email already exists in database
function emailExists($conn, $email)
{
    $sql = "SELECT email, password, name FROM employee WHERE email = '$email' UNION SELECT email, password, name FROM employer WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    var_dump($result); // Debug statement
    if ($result === false) {
        echo mysqli_error($conn); // Debug statement
    }
    $num_rows = mysqli_num_rows($result);
    var_dump($num_rows); // Debug statement
    return $num_rows > 0;
}

?>
