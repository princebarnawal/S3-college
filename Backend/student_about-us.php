<!DOCTYPE html>
<html>

<head>
  <title>About Us - S3 College</title>
  <link rel="stylesheet" type="text/css" href="../Assets/CSS/style.css">
  <link rel="stylesheet" type="text/css" href="../Assets/CSS/about-us.css">
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

      <div class="anchar">
        <a href="../Frontend/home.html" id="ar">Home</a>
        <a href="../Frontend/course.html" id="ar">Course</a>
        <a id="ar" style="color: red;">About-Us</a>
        <a href="student_notice.php" id="ar">Notice</a>
        <a href="../Frontend/Contact.html" id="ar">Contact </a>
      </div>
    </div>
    <!-- <a href="../Frontend/index.html" class="login-btw">Login </a> -->
  </div>


  <div class="container">
    <h1>ABOUT S3 COLLEGE</h1>
    <p>S3 College is committed to academic excellence, innovation, and holistic development. We provide quality
      education with experienced faculty and modern facilities.</p>

    <h2>Our Faculty</h2>
    <div class="faculty-cards">


        <?php
        $con = mysqli_connect('localhost', 'root', '', 'S3_College');
            if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT teacher_name, subject_name, image_path FROM teacher_details ORDER BY id DESC";
        $result = mysqli_query($con, $query);



if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        echo "<div class='card'>";

        echo "<img src='../" . htmlspecialchars($row['image_path']) . "' width='200' height='180'>";
        echo "<h3>" . htmlspecialchars($row['teacher_name']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['subject_name']) . "</p>";

        echo "</div>";
    }
} else {
    echo "<p>No teachers added yet.</p>";
}
            
        ?>

    </div>


    <h2>Our Achievements</h2>
    <div class="achievements">
        <ul>
            <li>Best Emerging College Award 2025</li>
            <li>NAAC Accredited 'A' Grade</li>
            <li>95% Placement Success</li>
            <li>Partnerships in different IT Company</li>
            <li>International Seminars & Internship</li>
        </ul>
    </div>
    </div>

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