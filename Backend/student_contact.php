<?php
$con=mysqli_connect('localhost','root','') or die('connection error');

 $create="create database if not exists S3_College ";
 mysqli_query($con,$create) or die('Database creation error');
 
  mysqli_select_db($con,'S3_College');

    $createTbl = "CREATE TABLE IF NOT EXISTS contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(20),
        email VARCHAR(30),
        subject VARCHAR(200),
        message varchar(400)
    )";
mysqli_query($con, $createTbl) or die("Tale Creation Error");
    if (!mysqli_query($con, $createTbl)) {
        die("Table creation error: " . mysqli_error($con));
    }
    

    if(isset($_POST['submit']))
    {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $insert = "INSERT INTO contact (name, email, subject, message) 
        VALUES('$name', '$email', '$subject', '$message')";

    mysqli_query($con,$insert) or die('insertion failed');
    echo "Thank you, $name Your message has been sucessfully send.";
    }
  ?>