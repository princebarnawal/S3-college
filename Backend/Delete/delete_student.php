<?php
$con = mysqli_connect("localhost", "root", "", "S3_College");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Delete Student
if (isset($_GET['delete'])) {

    $id = intval($_GET['delete']);

    $delete = mysqli_query($con, "DELETE FROM t_insert_student_id WHERE id = $id");

    if ($delete) {
        echo "<script>alert('Student deleted successfully!');</script>";
    } else {
        echo "<script>alert('Failed to delete student!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>

    <style>

    body{
        font-family:Arial;
        background:#f2f2f2;
    }

    .container{
        width:95%;
        margin:40px auto;
    }

    table{
        width:100%;
        border-collapse:collapse;
        background:white;
    }

    th,td{
        border:1px solid #ddd;
        padding:12px;
        text-align:center;
    }

    th{
        background:#0d6efd;
        color:white;
    }

    tr:nth-child(even){
        background:#f9f9f9;
    }

    .delete-btn{
        background:red;
        color:white;
        padding:8px 15px;
        text-decoration:none;
        border-radius:5px;
    }

    .delete-btn:hover{
        background:darkred;
    }

    </style>

</head>
<body>

<div class="container">

<h2 align="center">All Students</h2>

<table>

<tr>
    <th>Student ID</th>
    <th>Student Name</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($con, "SELECT * FROM t_insert_student_id ORDER BY student_id DESC");

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>



<td><?php echo $row['student_id']; ?></td>

<td><?php echo $row['student_name']; ?></td>

<td>
<a class="delete-btn"
href="?delete=<?php echo $row['student_id']; ?>"
onclick="return confirm('Are you sure you want to delete this student?');">
Delete
</a>
</td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>