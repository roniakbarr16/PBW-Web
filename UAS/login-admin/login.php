<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $query = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$username' AND password='$password'"
  );

  if (mysqli_num_rows($query) > 0) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: home.php");
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card mx-auto" style="width: 400px;">
    <div class="card-body">
      <h4 class="text-center">Login</h4>

      <?php if(isset($error)) { ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php } ?>

      <form method="post">
        <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
        <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
        <button name="login" class="btn btn-primary w-100">Login</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>
