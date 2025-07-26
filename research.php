<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Research</title>
  <link rel="stylesheet" href="css/style.css" />
</head>
<body>
  <?php include 'includes/header.php'; ?>

  <section>
    <h2>Research & Publications</h2>

    <?php
    $sql = "SELECT * FROM research ORDER BY published_year DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo "<ul>";
      while ($row = $result->fetch_assoc()) {
        echo "<li><strong>" . htmlspecialchars($row['title']) . " (" . $row['published_year'] . "):</strong> " . htmlspecialchars($row['description']) . "</li>";
      }
      echo "</ul>";
    } else {
      echo "<p>No research projects found.</p>";
    }
    ?>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
