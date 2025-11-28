<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'contact';
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
                <h5>Tambah Data Kontak</h5>
            </div>
            <div class="card-body">
                <form action="../../action/contact/store.php" method="POST" enctype="multipart/form-data">
                
                    <div class="mb-3">
                        <label for="imgInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="img" class="form-control" id="imgInput" required>
                    </div>
                     <div class="mb-3">
                        <label for="contactInput" class="form-label">Kontak</label>
                        <input type="text" name="contact" class="form-control" id="contactInput" placeholder="Masukan Kontak..."  required>
                    </div>
                    <div class="mb-3">
                        <label for="link_urlInput" class="form-label">Tautan</label>
                        <input type="text" name="link_url" class="form-control" id="link_urlInput" placeholder="Masukan tautan..."  required>
                    </div>

                     <div class="mb-3"> 
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="emailInput" placeholder="Masukan Email..."  required>     
                    </div>

                     <div class="mb-3"> 
                        <label for="link_mapInput" class="form-label">tautan map</label>
                        <input type="text" name="link_map" class="form-control" id="link_mapInput" placeholder="Masukan tautan map..."  required>     
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