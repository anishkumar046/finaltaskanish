<?php include 'includes/db.php'; session_start(); ?>

<?php
$msg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'];
  $batch_year = $_POST['batch_year'];
  $company = $_POST['company'];
  $designation = $_POST['designation'];
  $email = $_POST['email'];

  // Check for existing email
  $check = $conn->prepare("SELECT id FROM alumni WHERE email = ?");
  $check->bind_param("s", $email);
  $check->execute();
  $check->store_result();

  if ($check->num_rows > 0) {
    $msg = "<p style='color:red;'>You have already registered as alumni.</p>";
  } else {
    $stmt = $conn->prepare("INSERT INTO alumni (name, batch_year, company, designation, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $name, $batch_year, $company, $designation, $email);
    $stmt->execute();
    $stmt->close();
    $msg = "<p style='color:green;'>Registration successful!</p>";
  }

  $check->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Alumni</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<?php include 'includes/header.php'; ?>

<section>
  <h2>Alumni Registration</h2>
  <?= $msg ?>
  <form method="POST" style="margin-bottom: 40px;">
    <label>Full Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Batch Year:</label><br>
    <input type="number" name="batch_year" required><br><br>

    <label>Company:</label><br>
    <input type="text" name="company"><br><br>

    <label>Designation:</label><br>
    <input type="text" name="designation"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <button type="submit">Submit</button>
  </form>
</section>

<section>
  <h2>Our Alumni</h2>
  <?php
  $result = $conn->query("SELECT * FROM alumni ORDER BY batch_year DESC");

  if ($result->num_rows > 0) {
    echo "<table border='1' cellpadding='10'>
            <tr><th>Name</th><th>Batch</th><th>Company</th><th>Designation</th></tr>";
    while ($row = $result->fetch_assoc()) {
      echo "<tr>
              <td>" . htmlspecialchars($row['name']) . "</td>
              <td>" . $row['batch_year'] . "</td>
              <td>" . htmlspecialchars($row['company']) . "</td>
              <td>" . htmlspecialchars($row['designation']) . "</td>
            </tr>";
    }
    echo "</table>";
  } else {
    echo "<p>No alumni records found.</p>";
  }
  ?>
</section>

<?php include 'includes/footer.php'; ?>
</body>
</html>
