<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Selamat Datang, <?= $_SESSION['username']; ?></h3>

  <a href="tambah_user.php" class="btn btn-success mb-3">Tambah User</a>
  <a href="logout.php" class="btn btn-danger mb-3">Logout</a>

  <table class="table table-bordered">
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Aksi</th>
    </tr>

    <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
    <tr>
      <td><?= $no++; ?></td>
      <td><?= $row['username']; ?></td>
      <td>
        <a href="edit_user.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="delete_user.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin hapus user?')">Hapus</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>
