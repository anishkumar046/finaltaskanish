<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Courses</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <?php include 'includes/header.php'; ?>

  <section>
    <h2>Courses Offered</h2>
    <?php
    $result = $conn->query("SELECT * FROM courses");
    while($row = $result->fetch_assoc()) {
        echo "<p>{$row['name']} ({$row['duration']}, {$row['seats']} seats)</p>";
    }
    ?>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
