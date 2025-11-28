<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'visi_mission';
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
                <h5>Tambah Data visi misi</h5>
            </div>
            <div class="card-body">
                <form action="../../action/visi_mission/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label class="form-label" >Kategory</label>
                       <select class="form-select" aria-label="Default select example" name="category" required>
                            <option selected>Pilih kategori</option>
                            <option value="visi">visi</option>
                            <option value="misi">misi</option>
                          
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="textInput" class="form-label">Text</label>
                        <textarea name="text" class="form-control" id="textInput" placeholder="Masukan text..."  rows="5" ></textarea>  
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