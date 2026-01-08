<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  mysqli_query($conn,
    "INSERT INTO users (username, password) VALUES ('$username','$password')"
  );
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
      <h4 class="text-center mb-4">Tambah User</h4>

      <form method="post">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between">
          <a href="home.php" class="btn btn-secondary">Kembali</a>
          <button name="simpan" class="btn btn-success">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

</body>
</html>
