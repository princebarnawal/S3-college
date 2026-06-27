<!DOCTYPE html>
<html>
<head>
<title>Notices & Results - S3 College</title>
<link rel="stylesheet"  type="text/css" href="../Assets/CSS/style.css">
<link rel="stylesheet" type="text/css" href="../Assets/CSS/notice.css">
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
      <a href="../Frontend/home.html" id="ar" >Home</a>
      <a href="../Frontend/course.html" id="ar">Course</a>
      <a href="student_about-us.php" id="ar">About-Us</a>
      <a id="ar" style="color: red;">Notice</a>
      <a href="../Frontend/Contact.html" id="ar">Contact </a>
    </div>
    </div>
    <a href="../Frontend/index.html" class="login-btw">Login</a>
  </div>
 

<div class="container">
    <h1>NOTICES & RESULTS</h1>

   <div class="notices">
    <h2>Latest Notices</h2>
       <ul>
              <!-- Retrive code from database and show in student notice page  -->
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'S3_College');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT title, description, created_at FROM teacher_notices ORDER BY created_at DESC LIMIT 6";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><strong>" . htmlspecialchars($row['title']) . "</strong>: " 
                    . htmlspecialchars($row['description']) 
                    . " <em>(" . $row['created_at'] . ")</em></li>";
            }
        } else {
            echo "<li>No notices available at this moment.</li>";
        }

        // mysqli_close($con);
        
        ?>


    </ul>
</div>



      <!-- Student search there result here-->
    <div class="search-section">
        <h2>Check Your Result</h2>
        <p>Enter your Symbol Number to see your exam result:</p>

        <form method="post">
        <input type="text" name="search_symbol" placeholder="Enter Symbol Number" required>
        <button type="submit" name="search">Search</button>
    </form>

        <div id="result">

            <?php
        if (isset($_POST['search'])) {
            $search_symbol = $_POST['search_symbol'];

            $stmt = mysqli_prepare($con, "SELECT student_name, percentage FROM teacher_results WHERE student_symboll = ?");
            mysqli_stmt_bind_param($stmt, "i", $search_symbol);
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                echo "<h3>Result Found:</h3>";
                echo "Name: " . htmlspecialchars($row['student_name']) . "<br>";
                echo "Percentage: " . htmlspecialchars($row['percentage']) . "%";
            } else {
                echo "<h3>No result found for this symbol number.</h3>";
            }
        }
        ?>
        </div>
    </div>
</div>


            <!-- footer -->
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
