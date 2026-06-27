<?php
// -------- DB CONNECTION -------
$con = mysqli_connect('localhost', 'root', '', 'S3_College');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

//  DELETE
if (isset($_POST['delete_id'])) {

    $teacher_id = $_POST['delete_id'];

    // Get image path
    $stmt = $con->prepare("SELECT image_path FROM teacher_details WHERE id = ?");
    $stmt->bind_param("i", $teacher_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Delete image
    if (!empty($row['image_path']) && file_exists($row['image_path'])) {
        unlink($row['image_path']);
    }

    // Delete record
    $stmt = $con->prepare("DELETE FROM teacher_details WHERE id = ?");
    $stmt->bind_param("i", $teacher_id);

    if ($stmt->execute()) {
        $message = "Teacher deleted successfully!";
    } else {
        $message = "Error deleting teacher!";
    }
}

// Fetch data
$result = mysqli_query($con, "SELECT * FROM teacher_details");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Teacher Detail</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0,0,0,0.15);
        }

        .card img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #4CAF50;
            margin-bottom: 10px;
        }

        .card h3 {
            margin: 10px 0 5px;
            color: #333;
        }

        .card p {
            color: #777;
            font-size: 14px;
        }

        .delete-btn {
            margin-top: 12px;
            padding: 8px 15px;
            border: none;
            background: #e74c3c;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .delete-btn:hover {
            background: #c0392b;
        }

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

<h1>Teacher Management</h1>

<?php if ($message) { ?>
    <div class="message"><?php echo $message; ?></div>
<?php } ?>

<div class="container">
<?php while ($row = mysqli_fetch_assoc($result)) { ?>

<?php
$image = "../Add/" . $row['image_path'];

if (!file_exists($image)) {
    $image = "../../uploads/" . basename($row['image_path']);
}
?>

<div class="card">

    <img src="<?php echo $image; ?>" alt="Teacher Image">

    <h3><?php echo htmlspecialchars($row['teacher_name']); ?></h3>

    <p><?php echo htmlspecialchars($row['subject_name']); ?></p>

    <form method="POST">
        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">

        <button type="submit"
                class="delete-btn"
                onclick="return confirm('Are you sure you want to delete this teacher?');">
            Delete
        </button>
    </form>

</div>

<?php } ?>

</div>

</body>
</html>

<?php mysqli_close($con); ?>

