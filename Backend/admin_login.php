<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "S3_College");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM admin 
              WHERE username='$username' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin_panel.php");
        exit();
    } else {
        echo "Invalid Username or Password";
    }
}
?>

<form method="POST" action="">
    <h2>Admin Login</h2>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>