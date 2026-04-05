<?php
// ---------------- DB CONNECTION ----------------
$con = mysqli_connect('localhost', 'root', '', 'S3_College');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

// ---------------- DELETE NOTICE ----------------
if (isset($_POST['delete_id'])) {
    $notice_id = $_POST['delete_id'];

    // Prepare delete statement
    $stmt = $con->prepare("DELETE FROM teacher_notices WHERE id = ?");
    $stmt->bind_param("i", $notice_id);

    if ($stmt->execute()) {
        $message = "Notice deleted successfully!";
    } else {
        $message = "Error deleting notice: " . $stmt->error;
    }
}

// Fetch all notices
$result = mysqli_query($con, "SELECT * FROM teacher_notices ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Teacher Notices</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f4f7fb;
            padding: 20px;
        }
        h1 { text-align: center; margin-bottom: 20px; }
        .notice-container {
            max-width: 800px;
            margin: auto;
        }
        .notice-card {
            background: #fff;
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            position: relative;
            transition: 0.3s;
        }
        .notice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        }
        .notice-card h3 {
            margin: 0 0 8px 0;
            color: #2c3e50;
        }
        .notice-card p {
            color: #555;
            font-size: 14px;
        }
        .delete-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            background: #e74c3c;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }
        .delete-btn:hover { background: #c0392b; }
        .message {
            text-align: center;
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<h1>Teacher Notices</h1>

<?php if ($message) { ?>
    <div class="message"><?php echo $message; ?></div>
<?php } ?>

<div class="notice-container">

<?php if(mysqli_num_rows($result) > 0) { 
    while($row = mysqli_fetch_assoc($result)) { ?>
    
    <div class="notice-card">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo htmlspecialchars($row['description']); ?></p>
        <form method="POST">
            <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
            <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this notice?');">Delete</button>
        </form>
    </div>

<?php } } else { ?>
    <p style="text-align:center;">No notices found.</p>
<?php } ?>

</div>

</body>
</html>

<?php mysqli_close($con); ?>