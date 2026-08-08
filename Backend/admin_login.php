<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "S3_College");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

$error = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = mysqli_prepare(
        $conn,
        "SELECT username, password FROM admin WHERE username = ? LIMIT 1"
    );

    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        if ($password === $row['password']) {

            session_regenerate_id(true);

            $_SESSION['admin'] = $row['username'];

            header("Location: admin_panel.php");
            exit();

        } else {
            $error = "Invalid Username or Password";
        }

    } else {
        $error = "Invalid Username or Password";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Login</title>

    <link rel="stylesheet" href="../Assets/CSS/admin.css">

</head>

<body>

<form method="POST" action="">

    <h2>Admin Login</h2>

    <p class="admin-subtitle">
        Sign in to access the admin panel
    </p>

    <?php if (!empty($error)): ?>
        <div class="error-message">
            <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <input
        type="text"
        name="username"
        placeholder="Admin Username"
        autocomplete="username"
        required
    >

    <input
        type="password"
        name="password"
        placeholder="Password"
        autocomplete="current-password"
        required
    >

    <button type="submit" name="login">
        Login
    </button>

    <p class="security-text">
        🔒 Authorized administrators only
    </p>

</form>

</body>
</html>