<?php
$con = mysqli_connect('localhost', 'root', '', 'S3_College');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table
$createTbl = "CREATE TABLE IF NOT EXISTS teacher_notices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($con, $createTbl);

// Insert notice
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = mysqli_prepare($con, "INSERT INTO teacher_notices (title, description) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ss", $title, $description);

    if (mysqli_stmt_execute($stmt)) {
        echo " $title Notice published successfully!";
    } else {
        echo "Publish failed: " . mysqli_error($con);
    }
}

    ?>

