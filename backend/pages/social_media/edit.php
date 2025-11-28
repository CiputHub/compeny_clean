<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'social_media';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!-- content -->
  <div id="layoutSidenav_content">
 <div class="row px-5 mt-5  justify-content-center">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h5>Ubah Data Social Media</h5>
            </div>
            <div class="card-body">
            <?php
            include '../../action/social_media/show.php';
            ?>
            <form action="../../action/social_media/update.php?id=<?= $social_media->id ?>" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="iconInput" class="form-label">Ikon</label>
                <input type="text" name="icon" id="iconInput" class="form-control" placeholder="Masukkan ikon social media..." required value="<?= $social_media->icon ?>">
              </div>
              <div class="mb-3">
                <label for="titleInput" class="form-label">Judul</label>
                <input type="text" name="title" id="titleInput" class="form-control" placeholder="Masukkan judul social media..." required value="<?= $social_media->title ?>">
              </div>
              <div class="mb-3">
                <label for="link_urlInput" class="form-label">Tautan</label>
                <input type="text" name="link_url" id="link_urlInput" class="form-control" placeholder="Masukkan tautan social media..." required value="<?= $social_media->link_url ?>">
              </div>
              <button type="submit" class="btn btn-primary" name="tombol">Edit</button>
              <a href="./index.php" class="btn btn-primary">Kembali</a>
            </form>
            </div>
        </div>
    </div>
 </div>

 <?php
 include '../../partials/footer.php';
 include '../../partials/script.php';
 ?>