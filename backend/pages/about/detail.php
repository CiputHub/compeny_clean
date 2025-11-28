<?php

session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}



$current_dir = 'about';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!-- contect -->
  <div id="layoutSidenav_content">
 <div class="row px-5 mt-5  justify-content-center">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data Tentang Kami</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/about/show.php';
                ?>
                <form>
                    <div class="mb-3">
                        <label for="school_nameInput" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?=$about->school_name?>" disabled>
                    </div>
                     <div class="mb-3">
                        <h6>Logo Sekolah</h6>
                        <img class="w-25" src="../../../storages/about/<?= $about->school_logo ?>" alt="">
                    </div>
                     <div class="mb-3">
                        <h6>Banner Sekolah</h6>
                        <img class="w-25" src="../../../storages/about/<?= $about->school_banner ?>" alt="">
                    </div>
                    <div class="mb-3">
                        <label for="school_taglineInput" class="form-label">Slogan</label>
                        <input type="text" class="form-control" value="<?=$about->school_tagline?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="school_descriptionInput" class="form-label">Deskripsi Sekolah</label>
                        <textarea class="form-control" rows="5" disabled><?=$about->school_description?></textarea>
                    </div>
            
                    <div class="mb-3">
                        <label for="sinceInput" class="form-label">Tahun Berdiri</label>
                        <input type="date" class="form-control" value="<?=$about->since?>" disabled>
                    </div>
                    
                    <div class="mb-3">
                        <label for="alamatInput" class="form-label">Alamat</label>
                        <textarea class="form-control" rows="5" disabled><?=$about->alamat?></textarea>
                    </div>

                   <div class="mb-3">
                        <h6>Video Background</h6>
                        <?php if (!empty($about->school_video)) : ?>
                            <video class="w-50" controls>
                                <source src="../../../storages/about/<?= $about->school_video ?>" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        <?php else: ?>
                            <p class="text-muted">Belum ada video</p>
                        <?php endif; ?>
                    </div>

                       
                    
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