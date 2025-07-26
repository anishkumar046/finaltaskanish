<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Labs</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <?php include 'includes/header.php'; ?>

  <section>
    <h2>Labs & Infrastructure</h2>

    <?php
    $sql = "SELECT * FROM labs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<ul>";
      while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . htmlspecialchars($row['lab_name']) . ":</strong> " . htmlspecialchars($row['description']) . "</li>";
      }
      echo "</ul>";
    } else {
      echo "<p>No labs found.</p>";
    }
    ?>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
