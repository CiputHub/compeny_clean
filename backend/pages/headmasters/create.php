    <?php
    session_start();
    if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'headmasters';
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
                <h5>Tamnbah Data kepala sekolah</h5>
            </div>
            <div class="card-body">
                <form action="../../action/headmasters/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="headmaster_nameInput" class="form-label">Judul</label>
                        <input type="text" name="headmaster_name" class="form-control" id="headmaster_nameInput" placeholder="Masukan Judul..."  required>
                    </div>
                    <div class="mb-3">
                        <label for="headmaster_photoInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="headmaster_photo" class="form-control" id="headmaster_photoInput" required>
                    </div>
 

                    <div class="mb-3">
                        <label for="headmaster_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="headmaster_description" id="headmaster_description" class="form-control" placeholder="Masukan Deskripsi..." rows="5" ></textarea>
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