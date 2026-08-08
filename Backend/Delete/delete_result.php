<?php
$con = mysqli_connect('localhost', 'root', '', 'S3_College');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

// ---------------- DELETE RESULT ----------------
if (isset($_POST['delete_id'])) {
    $result_id = $_POST['delete_id'];

    $stmt = $con->prepare("DELETE FROM teacher_results WHERE id = ?");
    $stmt->bind_param("i", $result_id);

    if ($stmt->execute()) {
        $message = "Result deleted successfully!";
    } else {
        $message = "Error deleting result: " . $stmt->error;
    }
}

// Fetch all results
$result = mysqli_query($con, "SELECT * FROM teacher_results ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student Results</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #f4f7fb;
            padding: 20px;
        }
        h1 { text-align: center; margin-bottom: 20px; }

        .message {
            text-align: center;
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .delete-btn {
            padding: 6px 12px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s;
        }

        .delete-btn:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>

<h1>Student Results</h1>

<?php if ($message) { ?>
    <div class="message"><?php echo $message; ?></div>
<?php } ?>

<table>
    <tr>
        <!-- <th>ID</th> -->
        <th>Symbol No.</th>
        <th>Student Name</th>
        <th>Percentage</th>
        <th>Action</th>
    </tr>

    <?php if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                
                <td><?php echo htmlspecialchars($row['student_symboll']); ?></td>
                <td><?php echo htmlspecialchars($row['student_name']); ?></td>
                <td><?php echo htmlspecialchars($row['percentage']); ?>%</td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button class="delete-btn" onclick="return confirm('Are you sure you want to delete this result?');">Delete</button>
                    </form>
                </td>
            </tr>
    <?php } } else { ?>
        <tr>
            <td colspan="5">No results found.</td>
        </tr>
    <?php } ?>
</table>

</body>
</html>

<?php mysqli_close($con); ?>