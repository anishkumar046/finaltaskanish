<?php include 'includes/db.php'; session_start(); ?>
<?php
if (!isset($_SESSION['faculty_user'])) {
  header("Location: login.php");
  exit();
}
$user = $_SESSION['faculty_user'];
$query = $conn->query("SELECT * FROM faculty WHERE username='$user'");
$data = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faculty Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    .timetable {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
    }
    .timetable th, .timetable td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: center;
    }
    .timetable th {
      background-color: #f2f2f2;
    }
    .dashboard {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
    }
    .logout-btn {
      display: inline-block;
      padding: 10px 20px;
      background-color: #d9534f;
      color: white;
      text-decoration: none;
      border-radius: 5px;
      float: right;
      margin-top: -50px;
    }
    .logout-btn:hover {
      background-color: #c9302c;
    }
  </style>
</head>
<body>

  <?php include 'includes/header.php'; ?>

  <section class="dashboard">
    <a href="logout.php" class="logout-btn">Logout</a>
    <h2>Faculty Dashboard</h2>
    <p><strong>Welcome, <?= htmlspecialchars($data['name']) ?></strong></p>

    <h3>Weekly Timetable</h3>
    <table class="timetable">
      <tr>
        <th>Day</th>
        <th>9:00 - 10:00</th>
        <th>10:00 - 11:00</th>
        <th>11:00 - 12:00</th>
        <th>12:00 - 1:00</th>
        <th>2:00 - 3:00</th>
        <th>3:00 - 4:00</th>
      </tr>
      <tr>
        <td>Monday</td>
        <td>Data Structures</td>
        <td>Maths</td>
        <td>OS</td>
        <td>Break</td>
        <td>DS Lab</td>
        <td>DS Lab</td>
      </tr>
      <tr>
        <td>Tuesday</td>
        <td>DBMS</td>
        <td>DBMS</td>
        <td>Maths</td>
        <td>Break</td>
        <td>Computer Networks</td>
        <td>Seminar</td>
      </tr>
      <tr>
        <td>Wednesday</td>
        <td>OS</td>
        <td>Data Structures</td>
        <td>Project</td>
        <td>Break</td>
        <td>CN Lab</td>
        <td>CN Lab</td>
      </tr>
      <tr>
        <td>Thursday</td>
        <td>DBMS</td>
        <td>CN</td>
        <td>OS</td>
        <td>Break</td>
        <td>Open Elective</td>
        <td>Open Elective</td>
      </tr>
      <tr>
        <td>Friday</td>
        <td>Project</td>
        <td>Project</td>
        <td>Data Structures</td>
        <td>Break</td>
        <td>Sports</td>
        <td>Sports</td>
      </tr>
    </table>
  </section>

  <?php include 'includes/footer.php'; ?>
</body>
</html>
