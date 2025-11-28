    <?php
    session_start();
    if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

    $current_dir = 'teachers';
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
                <h5>Tamnbah Data Guru</h5>
            </div>
            <div class="card-body">
                <form action="../../action/teachers/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="teachers_nameInput" class="form-label">Nama</label>
                        <input type="text" name="teachers_name" class="form-control" id="teachers_nameInput" placeholder="Masukan nama..."  required>
                    </div>
                    <div class="mb-3">
                        <label for="teachers_photoInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="teachers_photo" class="form-control" id="teachers_photoInput" required>
                    </div>
 

                    <div class="mb-3">
                        <label for="teachers_majorInput" class="form-label">Jurusan</label>
                        <input type="text" name="teachers_major" id="teachers_major" class="form-control" placeholder="Masukan jurusan..." required></input>
                    </div>

                    <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">-- Pilih Gender --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
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