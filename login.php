<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="login-style.css">
</head>
<body>
  <div class="container">
    <div class="login-box">
      <h2>Welcome Back</h2>
      <form action="#" method="POST">
        <div class="input-group">
          <input type="text" name="username" placeholder="Username" required>
        </div>
        <div class="input-group">
          <input type="password" name="password" placeholder="Password" required>
        </div>
        <div class="links">
          <a href="#">Forgot Password?</a>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
      </form>
      <p class="signup-text">New here? <a href="#">Sign Up</a></p>
    </div>
  </div>
</body>
</html>

<?php
include("connection.php");
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM form WHERE username='$username' AND password='$password'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);

    if ($total == 1) {
        $_SESSION['username'] = $username;
        header("Location: display.php");
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>