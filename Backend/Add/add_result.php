<?php

$con = mysqli_connect('localhost', 'root', '', 'S3_College');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table
$createTbl = "CREATE TABLE IF NOT EXISTS teacher_results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_symboll INT NOT NULL ,
    student_name VARCHAR(50) NOT NULL,
    percentage DECIMAL(5,2) NOT NULL
)";
mysqli_query($con, $createTbl);

// Insert data when form is submitted
if (isset($_POST['sub'])) {
    $std_symboll = $_POST['std_symboll'];
    $std_name = $_POST['std_name'];
    $percentage = $_POST['marks'];

    $stmt = mysqli_prepare($con, "INSERT INTO teacher_results (student_symboll, student_name, percentage) VALUES (?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "isd", $std_symboll, $std_name, $percentage);

    if (mysqli_stmt_execute($stmt)) {
        echo "Student result added successfully!";
    } else {
        echo "Insert failed: " . mysqli_error($con);
    }
}
?>