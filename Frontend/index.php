<?php
$con = mysqli_connect('localhost', 'root', '', 'S3_College');

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$query = "SELECT title, description, created_at 
          FROM teacher_notices 
          ORDER BY created_at DESC 
          LIMIT 6";

$result = mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html>
<head>
<title>Log-In - S3 College</title>
<link rel="stylesheet" type="text/css"  href="../Assets/CSS/style.css">
<link rel="stylesheet" type="text/css"  href="../Assets/CSS/login.css">

<style>
  .disabled-nav a {
    pointer-events: none;
    cursor: not-allowed;
    opacity: 0.6;
}

.notice-btn {
  background: #eed4aa;
  border-radius: 15px;
  padding: 15px 18px;
  color: black;
  font-weight: 1000;
  display: inline-flex;
  font-size: 10px;
  width: 102px;
  height: 50px;
  margin-top: 2px;
}

.notice-btn:hover{
    background:#d62828;
    transform: scale(1.01);
  }

  .notice-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
}

.notice-box {
    position: relative;
    width: 28%;
    max-width: 650px;
    max-height: 80vh;
    overflow-y: auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    box-sizing: border-box;
}

</style>
</head>
<body>
    <div class="apple">

  <div class="navbar">
    <div class="navrab">
      <img src="../Assets/Image/logo.png" alt="logo" id="ima" />
    </div>

    <div class="nav">
      <a id="name" style="color: black;">
        <u> S3 College </u>
      </a>
    </div>

    <div class="anchar disabled-nav">
      <a href="home.html" id="ar">Home</a>
      <a href="course.html" id="ar">Course</a>
      <a href="../Backend/student_about-us.php" id="ar">About-Us</a>
      <a href="../Backend/student_notice.php" id="ar">Notice</a>
      <a href="Contact.html" id="ar">Contact </a>
    </div>
    </div>
    <button type="button" class="notice-btn" onclick="openNotice()">  📢Notice</button>
  
  </div>

  

<div class="login-container">
    <h1>Login</h1>
  <form action="../Backend/student_login.php" method="POST" id="studentLoginForm">
    <input type="number" id="n3" name="stu_id" placeholder="Enter your id number">
    <input type="text" id="n1" name="name" placeholder="Enter your name">
    <input type="password" id="n5" name="pwd" placeholder="Password">
    <button type="submit" name="btw">Login</button>
</form>
<script src="../Assets/js/student_login.js"></script>
</div>
<div id="noticeModal" class="notice-modal">

    <div class="notice-box">

        <button class="close-btn" onclick="closeNotice()">
            &times;
        </button>

        <h2>📢 Latest Notices</h2>

        <?php
        if ($result && mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="login-notice">
                <h3> <?php echo htmlspecialchars($row['title']); ?> </h3>
                <p> <?php echo htmlspecialchars($row['description']); ?> </p>
                <small> Posted: <?php echo htmlspecialchars($row['created_at']); ?>
                </small>
            </div>
        <?php
            }
        } else {
        ?>
            <p class="no-notice">
                No notices available at this moment.
            </p>
        <?php
        }
        ?>
    </div>

</div>

<script>
function openNotice() {
    document.getElementById("noticeModal").style.display = "flex";
}
function closeNotice() {
    document.getElementById("noticeModal").style.display = "none";
}

</script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <div class="down">
    <hr>
    <div class="social-icons">
      <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
      <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
      <a href="https://wa.me/your_number" target="_blank"><i class="fab fa-whatsapp"></i></a>
      <a href="https://tiktok.com" target="_blank"><i class="fab fa-tiktok"></i></a>
    </div>
  
    <p> &copy; 2026 Website. All rights reserved.&nbsp;&nbsp;|&nbsp;&nbsp;Privacy Policy</p>
    <hr />
  </div>
  

</body>
</html>
