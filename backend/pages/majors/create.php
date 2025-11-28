<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'majors';
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
                <h5>Tamnbah Data Jurusan</h5>
            </div>
            <div class="card-body">
                <form action="../../action/majors/store.php" method="POST" enctype="multipart/form-data">
                    
                    <div class="mb-3">
                        <label for="majors_nameInput" class="form-label">Nama</label>
                        <input type="text" name="majors_name" class="form-control" id="majors_nameInput" placeholder="Masukan Nama..."  required>
                    </div>
                    
                        <div class="mb-3">
                            <label for="majors_imageInput" class="form-label">Pilih Gambar</label>
                            <input type="file" name="majors_image" class="form-control" id="majors_imageInput" required></input>
                        </div>
                        <div class="mb-3">
                            <label for="majors_descriptionInput" class="form-label">Deskripsi</label>
                            <textarea name="majors_description" class="form-control" id="majors_descriptionInput" placeholder="Masukan deskripsi..."  rows="5" ></textarea>  
                        </div>

                    <div class="mb-3">
                        <label for="headInput" class="form-label">Kepala Jurusan</label>
                        <input type="text" name="head" class="form-control" id="headInput" placeholder="Masukan kepala jurusan..."  required>
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