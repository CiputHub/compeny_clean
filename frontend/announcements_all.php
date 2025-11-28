<?php
include '../config/connection.php';
include 'partials/header.php';

// Ambil semua announcement
$qAnnouncements = "SELECT * FROM announcements ORDER BY id DESC";
$result = mysqli_query($connect, $qAnnouncements) or die(mysqli_error($connect));
?>

<div class="container my-5">
    
  <a href="index.php#about" class="btn btn-secondary mb-4">&larr; Kembali</a>
  <h2 class="mb-4 text-center">📢 Semua Pengumuman</h2>
  <div class="row">
    <?php while ($a = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="../storages/announcements/<?= $a['announcements_image'] ?>" class="card-img-top" alt="<?= $a['announcements_title'] ?>" style="height:200px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title"><?= $a['announcements_title'] ?></h5>
            <p class="card-text">
              <?= substr($a['announcements_description'], 0, 100) ?>...
            </p>
            <a href="announcement_detail.php?id=<?= $a['id'] ?>" class="btn btn-success btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    <?php } ?>
    
  </div>
</div>
