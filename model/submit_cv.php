<?php
$servername = 'localhost';
$db_username = 'root';
$db_password = '';
$dbname = 'CVManagement';
$conn = mysqli_connect($servername, $db_username, $db_password, $dbname);

$employee_id = $_SESSION['user_id'];
$job_objective = strip_tags($_POST['job_objective']);
$additional_info = strip_tags($_POST['additional_info']);

// Insert job objective and additional information into CV table
$sql = "INSERT INTO cv (employee_id, position, additional_information)
            VALUES ('$employee_id', '$job_objective', '$additional_info')";
// mysqli_query($conn, $sql);
try {
    mysqli_query($conn, $sql);
} catch (mysqli_sql_exception $e) {
    // do nothing
}

// Get the CV ID of the newly inserted CV
$cv_id = mysqli_insert_id($conn);

// Insert degrees into CV_DEGREES table
$degree_names = ($_POST['degree']);
$school_names = ($_POST['school']);
$years = $_POST['year'];
for ($i = 0; $i < count($degree_names); $i++) {
    $degree_name = mysqli_real_escape_string($conn, strip_tags($degree_names[$i]));
    $school_name = mysqli_real_escape_string($conn, strip_tags($school_names[$i]));
    $year = mysqli_real_escape_string($conn, $years[$i]);

    if ($degree_name == "" || $school_name == "" || $year == "")
        continue;
    $sql = "INSERT INTO cv_degrees (cv_id, degree_name, school_name, date_obtained)
                VALUES ('$cv_id', '$degree_name', '$school_name', '$year')";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        // do nothing
    }
}

// Insert certificates into CV_CERTIFICATES table
$certificate_titles = ($_POST['certificate_title']);
$certificate_organizations = ($_POST['certificate_organization']);
$certificate_years = ($_POST['certificate_year']);
$certificate_expirations = ($_POST['certificate_expiration']);
for ($i = 0; $i < count($certificate_titles); $i++) {
    $certificate_title = mysqli_real_escape_string(
        $conn,
        strip_tags($certificate_titles[$i])
    );
    $certificate_organization = mysqli_real_escape_string(
        $conn,
        strip_tags($certificate_organizations[$i])
    );
    $certificate_year = mysqli_real_escape_string(
        $conn,
        strip_tags($certificate_years[$i])
    );
    $certificate_expiration = mysqli_real_escape_string(
        $conn,
        strip_tags($certificate_expirations[$i])
    );
    if ($certificate_title == "" || $certificate_organization == "" || $certificate_year == "" || $certificate_expiration == "")
        continue;
    $sql = "INSERT INTO cv_certificates (cv_id, certificate_name, issuing_organization, date_obtained, expiration_date)
                VALUES ('$cv_id', '$certificate_title', '$certificate_organization', '$certificate_year', '$certificate_expiration')";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        // do nothing
    }
}

// Insert professional experiences into CV_EXPERIENCE table
for ($i = 0; $i < count($_POST['experience_title']); $i++) {
    $title = mysqli_real_escape_string($conn, $_POST['experience_title'][$i]);
    $company = mysqli_real_escape_string(
        $conn,
        strip_tags($_POST['experience_company'][$i])
    );
    $description = mysqli_real_escape_string(
        $conn,
        strip_tags($_POST['experience_description'][$i])
    );
    if ($title == "" || $description == "" || $description == "")
        continue;
    $sql = "INSERT INTO cv_experiences (cv_id, job_title, company_name, description)
        VALUES ('$cv_id', '$title', '$company', '$description')";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        // do nothing
    }
}
// insert skill

for ($i = 0; $i < count($_POST['skill']); $i++){
    $name = mysqli_real_escape_string($conn, strip_tags($_POST['skill'][$i]));
    if ($name == "")
        continue;
    $sql = "INSERT INTO cv_skills (cv_id, skills_name)
        VALUES ('$cv_id', '$name')";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        // do nothing
    }
}
// Insert references into CV_REFERENCES table
$reference_names = $_POST['reference_name'];
$reference_phones = $_POST['reference_phone'];
$reference_emails = $_POST['reference_email'];
$reference_relationships = $_POST['reference_relationship'];
for ($i = 0; $i < count($reference_names); $i++) {
    $reference_name = mysqli_real_escape_string(
        $conn,
        strip_tags($reference_names[$i])
    );
    $reference_phone = mysqli_real_escape_string(
        $conn,
        strip_tags($reference_phones[$i])
    );
    $reference_email = mysqli_real_escape_string(
        $conn,
        strip_tags($reference_emails[$i])
    );
    $reference_relationship = mysqli_real_escape_string(
        $conn,
        strip_tags($reference_relationships[$i])
    );
    if ($reference_name == "" || $reference_phone == "" || $reference_email == "" || $reference_relationship == "")
        continue;
    $sql = "INSERT INTO cv_references (cv_id, name, phone_number, email, relationship)
                VALUES ('$cv_id', '$reference_name', '$reference_phone', '$reference_email', '$reference_relationship')";
    try {
        mysqli_query($conn, $sql);
    } catch (mysqli_sql_exception $e) {
        // do nothing
    }
}


header('Location: ./index.php?page=create_cv&success=true');
exit();
?>