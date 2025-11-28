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
 <div class="row px-5 mt-5  justify-content-center ">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h5>Edit Data Tentang Kami</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/about/show.php';
                ?>
                <form action="../../action/about/update.php?id=<?= $about->id?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $about->id ?>">

                    <div class="mb-3">
                        <label for="school_nameInput" class="form-label">Nama Sekolah</label>
                        <input type="text" name="school_name" class="form-control" id="school_nameInput" placeholder="Masukan nama anda..." required value="<?=$about->school_name?>">
                    </div>

                    <div class="mb-3">
                        <label for="school_taglineInput" class="form-label">Slogan</label>
                        <input type="text" name="school_tagline" class="form-control" id="school_taglineInput" placeholder="Masukan slogan..." required value="<?=$about->school_tagline?>">
                    </div>
                    <div class="mb-3">
                        <label for="school_descriptionInput" class="form-label">Deskripsi Sekolah</label>
                        <textarea name="school_description" id="school_descriptionInput" class="form-control" placeholder="Masukan deskripsi sekolah..." rows="5" required><?=$about->school_description?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="sinceInput" class="form-label">Tahun Berdiri</label>
                        <input type="date" name="since" class="form-control" id="sinceInput" required value="<?=$about->since?>">   
                    </div>
                    <div class="mb-3">
                        <label for="alamatInput" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamatInput" class="form-control" placeholder="Masukan alamat sekolah..." rows="5" required><?=$about->alamat?></textarea>  
                    </div>
                     <div class="mb-3">
                        <img class="w-25" src="../../../storages/about/<?=$about->school_logo?>" alt="">
                        <label for="school_logoInput" class="form-label"></label>
                        <input type="file" name="school_logo" class="form-control" id="school_logoInput"></input>
                    </div>
                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/about/<?=$about->school_banner?>" alt="">
                        <label for="school_bannerInput" class="form-label"></label>
                        <input type="file" name="school_banner" class="form-control" id="school_bannerInput"></input>
                    </div>

                 <div class="mb-3">
                    <label for="school_video" class="form-label">Video Background</label>
                    <?php if (!empty($about->school_video)) : ?>
                        <video class="d-block mb-2 w-50" controls>
                            <source src="../../../storages/about/<?= $about->school_video ?>" type="video/mp4">
                        </video>
                    <?php endif; ?>
                    <input type="file" class="form-control" name="school_video" id="school_video" accept="video/mp4">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti</small>
                </div>


                    
                    
                    <button type="submit" class="btn btn-primary me-3" name="tombol">Edit</button>
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