<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM admin WHERE username='$username'";
  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    // Verifikasi password yang diinput dengan yang di-hash di database
    if (password_verify($password, $row['Password'])) {
      $_SESSION['admin_login'] = $username;
      header("Location: admin.php");
      exit;
    }
  }
  $error = "Username atau password salah!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <style>
    body {
      font-family: Arial;
      background: #f5f5f5;
      display: flex;
      height: 100vh;
      justify-content: center;
      align-items: center;
    }
    .login-box {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    .login-box h2 {
      margin-bottom: 20px;
      color: #d63384;
    }
    .login-box input {
      display: block;
      width: 100%;
      margin: 10px 0;
      padding: 10px;
    }
    .login-box button {
      background: #d63384;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
    }
    .error {
      color: red;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login Admin</h2>
    <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
      <input type="text" name="username" placeholder="Username" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
