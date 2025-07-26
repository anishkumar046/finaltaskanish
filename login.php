<?php include 'includes/db.php'; session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Faculty Registration</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <?php include 'includes/header.php'; ?>

  <section class="login-form" style="max-width:500px;margin:40px auto;padding:20px;border:1px solid #ccc;border-radius:10px;">
    <h2 style="text-align:center;">Faculty Registration</h2>
    <form method="POST">
      <input type="text" name="name" placeholder="Full Name" required style="width:100%;padding:10px;margin:10px 0;">
      <input type="email" name="email" placeholder="Email" required style="width:100%;padding:10px;margin:10px 0;">
      <input type="text" name="username" placeholder="Username" required style="width:100%;padding:10px;margin:10px 0;">
      <input type="password" name="password" placeholder="Password" required style="width:100%;padding:10px;margin:10px 0;">
      <button type="submit" name="register" style="width:100%;padding:10px;background:#004080;color:white;border:none;">Register</button>
    </form>
    <p style="text-align:center;margin-top:15px;">Already registered? <a href="register.php">Login here</a></p>
  </section>

  <?php include 'includes/footer.php'; ?>

  <?php
  if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Check for duplicates
    $check = $conn->prepare("SELECT * FROM faculty WHERE username=? OR email=?");
    $check->bind_param("ss", $user, $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
      echo "<script>alert('Username or Email already exists');</script>";
    } else {
      $stmt = $conn->prepare("INSERT INTO faculty (name, email, username, password) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $name, $email, $user, $pass);

      if ($stmt->execute()) {
        echo "<script>alert('Registration successful! Please login.'); window.location.href='register.php';</script>";
      } else {
        echo "<script>alert('Something went wrong. Try again.');</script>";
      }
    }
  }
  ?>

</body>
</html>
