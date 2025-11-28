<?php
include '../config/connection.php';
include 'partials/header.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location.href='announcements_all.php';</script>";
    exit;
}

$id = intval($_GET['id']);
$qSelect = "SELECT * FROM announcements WHERE id = $id";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$a = mysqli_fetch_assoc($result);

if (!$a) {
    echo "<script>alert('Pengumuman tidak ditemukan'); window.location.href='announcements_all.php';</script>";
    exit;
}
?>

<div class="container my-5">
  <div class="card shadow border-0">
    
    <!-- Gambar biar full keliatan rapi -->
    <div style="background:#f8f9fa; display:flex; justify-content:center; align-items:center; max-height:500px; overflow:hidden;">
      <img src="../storages/announcements/<?= $a['announcements_image'] ?>" 
           alt="<?= $a['announcements_title'] ?>" 
           style="max-width:100%; max-height:500px; object-fit:contain;">
    </div>

    <!-- Isi -->
    <div class="card-body">
      <h2 class="card-title mb-3"><?= $a['announcements_title'] ?></h2>
      <p class="card-text"><?= nl2br($a['announcements_description']) ?></p>
      <a href="announcements_all.php" class="btn btn-secondary mt-3">
        ⬅ Kembali
      </a>
    </div>

  </div>
</div>
