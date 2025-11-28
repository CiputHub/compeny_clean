<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

if(!isset($_SESSION['user_logged_in'])){
    header('Location: ../../pages/user/login.php');
    exit();
}


$current_dir = 'about';

include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!-- contect -->
     <div id="layoutSidenav_content">
 <div class="row px-5 mt-5 justify-content-center">
    <div class="col-9 ">
        <div class="card mb-4">
            <div class="card-header">
                <h5>Tambah Data Tentang Kami</h5>
            </div>
            <div class="card-body ">
                <form action="../../action/about/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="school_nameInput" class="form-label">Nama Sekolah</label>
                        <input type="text" name="school_name" class="form-control" id="school_nameInput" placeholder="Masukan nama sekolah..." required>
                    </div>
                    <div class="mb-3">
                        <label for="school_logoInput" class="form-label">Logo Sekolah</label>
                        <input type="file" name="school_logo" class="form-control" id="school_logoInput" placeholder="Masukan logo sekolah..." required>
                    </div>
                    <div class="mb-3">
                        <label for="school_bannerInput" class="form-label">Banner</label>
                        <input type="file" name="school_banner" class="form-control" id="school_bannerInput"  placeholder="Masukan banner sekolah..." required></input>
                    </div>
                    <div class="mb-3">
                        <label for="school_taglineInput" class="form-label">Slogan</label>
                        <input type="text" name="school_tagline" class="form-control" id="school_taglineInput"  placeholder="Masukan slogan sekolah..."  required></input>
                    </div>

                    <div class="mb-3">
                        <label for="school_descriptionInput" class="form-label">Deskripsi</label>
                        <input type="text" name="school_description" class="form-control" id="school_descriptionInput"  placeholder="Masukan deskripsi sekolah..." required></input>
                    </div>

                    <div class="mb-3">
                        <label for="sinceInput" class="form-label">Tahun Berdiri</label>
                        <input type="date" name="since" class="form-control" id="sinceInput" required></input>
                    </div>

                    <div class="mb-3">
                        <label for="alamatInput" class="form-label">Alamat</label>
                        <textarea name="alamat" id="alamatInput" class="form-control" placeholder="Masukan alamat sekolah..." rows="5" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="school_video" class="form-label">Video Background</label>
                        <input type="file" class="form-control" name="school_video" id="school_video" accept="video/mp4">
                    </div>


                    <button type="submit" class="btn btn-primary me-3" name="tombol">Tambah</button>
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