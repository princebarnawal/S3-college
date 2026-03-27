
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

    // image upload
    if (isset($_FILES['teacher_image']) && $_FILES['teacher_image']['error'] === 0)
    {
        $image_name = $_FILES['teacher_image']['name'];
        $image_tmp = $_FILES['teacher_image']['tmp_name'];

        if (move_uploaded_file($image_tmp, $image_name)) {

            $insert ="INSERT INTO teacher_details ( teacher_name, subject_name,) VALUES ('$teacher_name','$subject_name')";

            if (mysqli_query($con,$insert)) {
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




