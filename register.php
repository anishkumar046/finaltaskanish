<?php include 'includes/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faculty Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <?php include 'includes/header.php'; ?>

  <section class="login-form" style="max-width:500px;margin:40px auto;padding:20px;border:1px solid #ccc;border-radius:10px;">
    <h2 style="text-align:center;">Faculty Login</h2>
    <form method="POST">
      <input type="text" name="username" placeholder="Username" required style="width:100%;padding:10px;margin:10px 0;">
      <input type="password" name="password" placeholder="Password" required style="width:100%;padding:10px;margin:10px 0;">
      <button type="submit" name="login" style="width:100%;padding:10px;background:#004080;color:white;border:none;">Login</button>
    </form>
    <p style="text-align:center;margin-top:15px;">New user? <a href="register.php">Register here</a></p>
  </section>

  <?php include 'includes/footer.php'; ?>

  <?php
  if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM faculty WHERE username=? AND password=?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows == 1) {
      $_SESSION['faculty_user'] = $user;
      echo "<script>window.location.href='dashboard.php';</script>";
    } else {
      echo "<script>alert('Invalid username or password');</script>";
    }
  }
  ?>

</body>
</html>
