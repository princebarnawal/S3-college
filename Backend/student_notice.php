<div class="notices">
    <h2>Latest Notices</h2>
    <ul>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'S3_College');
        if (!$con) {
            die("Database connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT title, description, created_at FROM teacher_notices ORDER BY created_at DESC";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><strong>" . htmlspecialchars($row['title']) . "</strong>: " 
                    . htmlspecialchars($row['description']) 
                    . " <em>(" . $row['created_at'] . ")</em></li>";
            }
        } else {
            echo "<li>No notices available at the moment.</li>";
        }

        mysqli_close($con);
        ?>
    </ul>
</div>