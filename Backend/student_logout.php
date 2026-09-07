<?php
session_start();

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Logout</title>
    <meta http-equiv="refresh" content="3;url=../Frontend/index.html">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 15px rgba(0,0,0,0.15);
        }

        h1 {
            color: #28a745;
        }

        p {
            color: #555;
        }
    </style>
</head>

<body>

<div class="box">
    <h1>Logout Successful</h1>
    <p>You have been logged out.</p>
    <p>login again to access a page...</p>
</div>

</body>
</html>

