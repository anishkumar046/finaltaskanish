<?php include 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Faculty</title>
  <link rel="stylesheet" href="css/style.css" />
  <style>
    table {
      width: 90%;
      margin: 20px auto;
      border-collapse: collapse;
      text-align: left;
    }
    th, td {
      padding: 12px 15px;
      border-bottom: 1px solid #ccc;
    }
    th {
      background-color: #f2f2f2;
    }
    img.faculty-photo {
      width: 80px;
      height: 80px;
      object-fit: cover;
      border-radius: 50%;
    }
  </style>
</head>
<body>

  <?php include 'includes/header.php'; ?>

  <section>
    <h2 style="text-align:center;">Faculty Members</h2>
    <table>
      <tr>
        <th>Name</th>
        <th>Designation</th>
        <th>Qualification</th>
      </tr>
      <?php
      $result = $conn->query("SELECT * FROM department");
      while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['name']}</td>
                  <td>{$row['designation']}</td>
                  <td>{$row['qualification']}</td>
                </tr>";
      }
      ?>
    </table>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
