<?php

$con = mysqli_connect('localhost', 'root', '', 'S3_College');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table if not exists
$createTbl = "CREATE TABLE IF NOT EXISTS t_insert_student_id (
    student_id VARCHAR(20) NOT NULL PRIMARY KEY,
    student_name VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
)";
mysqli_query($con, $createTbl);

// Insert data when form is submitted
if (isset($_POST['submit'])) {
    $std_id = $_POST['student_id'];
    $std_name = $_POST['name'];
    $std_pass = $_POST['pwd'];

    // Step 1: Check if student_id already exists
    $checkStmt = mysqli_prepare($con, "SELECT student_id FROM t_insert_student_id WHERE student_id = ?");
    mysqli_stmt_bind_param($checkStmt, "s", $std_id);
    mysqli_stmt_execute($checkStmt);
    mysqli_stmt_store_result($checkStmt);

    if (mysqli_stmt_num_rows($checkStmt) > 0) {
        echo "Error: Student ID already exists!";
    } else {
        // Step 2: Insert new student
        $stmt = mysqli_prepare($con, "INSERT INTO t_insert_student_id (student_id, student_name, password) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $std_id, $std_name, $std_pass);

        if (mysqli_stmt_execute($stmt)) {
            echo "Student added successfully!";
        } else {
            echo "Insert failed: " . mysqli_error($con);
        }
    }

    // mysqli_stmt_close($checkStmt);
    // mysqli_stmt_close($stmt);
}

mysqli_close($con);
?>