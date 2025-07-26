<?php include 'includes/db.php'; session_start();

if (!isset($_SESSION['faculty_user'])) {
  header("Location: login.php");
  exit();
}

$user = $_SESSION['faculty_user'];
$id = intval($_GET['id'] ?? 0);

// Check ownership
$check = $conn->query("SELECT * FROM alumni WHERE id = $id AND created_by = '$user'");
if ($check->num_rows === 0) {
  echo "<p>You do not have permission to edit this record.</p>";
  exit();
}

// Handle update
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $batch = $_POST['batch_year'];
  $company = $_POST['company'];
  $designation = $_POST['designation'];

  $update = "UPDATE alumni SET name='$name', batch_year='$batch', company='$company', designation='$designation' WHERE id=$id AND created_by='$user'";
  if ($conn->query($update)) {
    header("Location: alumni.php");
    exit();
  } else {
    echo "<p>Error updating record.</p>";
  }
}

$data = $check->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Alumni</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'includes/header.php'; ?>

<section>
  <h2>Edit Alumni Information</h2>
  <form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required><br><br>
    <input type="number" name="batch_year" value="<?= $data['batch_year'] ?>" required><br><br>
    <input type="text" name="company" value="<?= htmlspecialchars($data['company']) ?>"><br><br>
    <input type="text" name="designation" value="<?= htmlspecialchars($data['designation']) ?>"><br><br>
    <button type="submit" name="update">Update</button>
  </form>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
