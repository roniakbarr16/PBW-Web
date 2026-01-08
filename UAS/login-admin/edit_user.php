<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(
  mysqli_query($conn, "SELECT * FROM users WHERE id='$id'")
);

if (isset($_POST['update'])) {
  $username = $_POST['username'];
  mysqli_query($conn,
    "UPDATE users SET username='$username' WHERE id='$id'"
  );
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card mx-auto" style="max-width: 500px;">
    <div class="card-body">
      <h4 class="text-center mb-4">Edit User</h4>

      <form method="post">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input
            type="text"
            name="username"
            class="form-control"
            value="<?= $data['username']; ?>"
            required
          >
        </div>

        <div class="d-flex justify-content-between">
          <a href="home.php" class="btn btn-secondary">Kembali</a>
          <button name="update" class="btn btn-warning">Update</button>
        </div>
      </form>

    </div>
  </div>
</div>

</body>
</html>
