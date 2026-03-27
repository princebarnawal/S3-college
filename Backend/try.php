<?php

$con = mysqli_connect('localhost', 'root', '', 'S3_College');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$createTbl = "CREATE TABLE IF NOT EXISTS teacher_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    teacher_name VARCHAR(50) NOT NULL,
    subject_name VARCHAR(50) NOT NULL,
    image_path VARCHAR(255) NOT NULL
)";
mysqli_query($con, $createTbl);

if (isset($_POST['submit'])) {
    $teacher_name = $_POST['teacher_name'];
    $subject_name = $_POST['subject_name'];

    if (isset($_FILES['teacher_image']) && $_FILES['teacher_image']['error'] === 0) {

        $image_name = $_FILES['teacher_image']['name'];
        $image_tmp = $_FILES['teacher_image']['tmp_name'];

        $upload_dir = "uploads/";
        $image_path = $upload_dir . basename($image_name);

        // Create folder if not exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($image_tmp, $image_path)) {

            $insert = "INSERT INTO teacher_details (teacher_name, subject_name, image_path) 
                       VALUES ('$teacher_name', '$subject_name', '$image_path')";

            if (mysqli_query($con, $insert)) {
                echo "Teacher added successfully!";
            } else {
                echo "Database insert failed: " . mysqli_error($con);
            }

        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "No image uploaded or upload error.";
    }
}
?>



      <form action=" " method="POST" enctype="multipart/form-data">
        <label for="teacher_name">Teacher Name:</label>
            <input type="text" id="teacher_name" name="teacher_name" placeholder="Enter Teacher Name" required><br>
        <label for="subject_name">Subject Name:</label>
            <input type="text" id="subject_name" name="subject_name" placeholder="Enter Subject Name" required><br>
        <label for="teacher_image">Upload Teacher Image:</label>
            <input type="file" id="teacher_image" name="teacher_image" accept="image/*" required> <br>
        <button type="submit" name="submit">Add Teacher</button>
      </form>