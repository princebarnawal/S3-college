<?php
$conn = mysqli_connect("localhost", "root", "", "S3_College");

$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
)";

mysqli_query($conn, $sql);

mysqli_query($conn, "INSERT INTO admin (username, password)
VALUES ('admin', 'admin12345')");

echo "Admin ready!";
?>