
<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}
?>






<!DOCTYPE html>
<html>

<head>
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="../Assets/css/admin_panel.css">
</head>

<body>

  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="#notice">Add Notice</a>
    <a href="#result">Add Result</a>
    <a href="#student">Add Student</a>
    <a href="#teacher">Add Teacher</a>  <br><br><br><br>
    <a href="Delete/delete_notices.php">Delete Notices</a>
    <a href="Delete/delete_result.php">Delete Result</a>
    <a href="Delete/delete_teacher.php">Delete Teacher Detail</a>
  </div>

  <div class="main">

    <!-- NOTICE -->
    <div class="card" id="notice">
      <h3>Publish Notice</h3>
      <form action="Add/add_notice.php" method="POST">
        <label for="title">Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter Title" required maxlength="100">
        <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter Description" required rows="5" maxlength="1000"></textarea>
        <button type="submit" name="submit">Publish</button>
      </form>
    </div>




    <!-- RESULT  -->
    <div class="card" id="result">
      <h3>Publish Result</h3>
      <form action="Add/add_result.php" method="POST">
        <label for="std_symboll">Symbol No:</label>
            <input type="number" id="std_symboll" name="std_symboll" placeholder="Enter symbol no" required min="1">
        <label for="std_name">Student Name:</label>
            <input type="text" id="std_name" name="std_name" placeholder="Student Name" required maxlength="50">
        <label for="marks">Percentage:</label>
            <input type="number" id="marks" name="marks" placeholder="Percentages" required min="0" max="100" step="0.01">
        <button type="submit" name="sub">Add Result</button>
      </form>
    </div>




    <!-- STUDENT -->
    <div class="card" id="student">
      <h3>Add Student</h3>
      <form action="Add/add_student.php" method="POST">
        <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" placeholder="Enter Student ID" required maxlength="20">
        <label for="name">Student Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter Student Name" required maxlength="50">
        <label for="password">Password:</label>
            <input type="password" id="password" name="pwd" placeholder="Enter your password" required minlength="6">
      <button type="submit" name="submit">Add Student</button>
      </form>
    </div>




    <div class="card" id="teacher">
      <form action="Add/add_teacher-detail.php" method="POST" enctype="multipart/form-data">
        <label for="teacher_name">Teacher Name:</label>
            <input type="text" id="teacher_name" name="teacher_name" placeholder="Enter Teacher Name" required><br>
        <label for="subject_name">Subject Name:</label>
            <input type="text" id="subject_name" name="subject_name" placeholder="Enter Subject Name" required><br>
        <label for="teacher_image">Upload Teacher Image:</label>
            <input type="file" id="teacher_image" name="teacher_image" accept="image/*" required> <br>
        <button type="submit" name="submit">Add Teacher</button>
      </form>
    </div>

  </div>

  

</body>

</html>