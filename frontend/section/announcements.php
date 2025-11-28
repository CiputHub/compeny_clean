<?php
include '../config/connection.php';

// Ambil 3 announcement terbaru
$qAnnouncements = "SELECT * FROM announcements ORDER BY id DESC LIMIT 3";
$result = mysqli_query($connect, $qAnnouncements) or die(mysqli_error($connect));
?>

<div class="container my-5">
  <h2 class="mb-4 text-center">📢 Pengumuman Sekolah</h2>
  <div class="row">
    <?php while ($item = mysqli_fetch_assoc($result)) { ?>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <img src="../storages/announcements/<?= $item['announcements_image'] ?>" class="card-img-top" alt="<?= $item['announcements_title'] ?>" style="height:200px; object-fit:cover;">
          <div class="card-body">
            <h5 class="card-title"><?= $item['announcements_title'] ?></h5>
            <p class="card-text">
              <?= substr($item['announcements_description'], 0, 100) ?>...
            </p>
            <a href="announcement_detail.php?id=<?= $item['id'] ?>" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="text-center mt-3">
    <a href="announcements_all.php" class="btn btn-outline-primary">Lihat Semua Pengumuman</a>
  </div>
</div>
