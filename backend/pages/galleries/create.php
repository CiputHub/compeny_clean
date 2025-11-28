<?php
$current_dir = 'galleries';
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
                <h5>Tambah Data Galleri</h5>
            </div>
            <div class="card-body">
                <form action="../../action/galleries/store.php" method="POST" enctype="multipart/form-data">
                
                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput" required>
                    </div>

                    
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput" placeholder="Masukan judul..." required>
                    </div>
                    
                      <!-- <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Masukan deskripsi..." rows="5" ></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="dateInput" class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="dateInput" required>
                    </div> -->


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