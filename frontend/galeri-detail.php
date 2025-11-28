<?php
include '../config/connection.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$qDetail = "SELECT * FROM galleries WHERE id = $id LIMIT 1";
$result = mysqli_query($connect, $qDetail) or die(mysqli_error($connect));
$item = $result->fetch_object();
if (!$item) {
    die("Data tidak ditemukan");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($item->title) ?> - Detail Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <a href="all-galeri.php" class="btn btn-secondary mb-4">&larr; Kembali</a>

  <div class="card shadow border-0">
    <img src="../storages/galleries/<?= $item->image ?>" class="card-img-top" alt="">
    <div class="card-body">
      <h3 class="card-title"><?= htmlspecialchars($item->title) ?></h3>
      <!-- <small class="text-muted d-block mb-3">
        <?= isset($item->date) ? date("d M Y", strtotime($item->date)) : '' ?>
      </small>
      <p class="card-text"><?= nl2br(htmlspecialchars($item->description)) ?></p> -->
    </div>
  </div>
</div>
</body>
</html>
