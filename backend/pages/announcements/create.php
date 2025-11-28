<?php

$current_dir = 'announcements';
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
                <h5>Tambah Data Pengumuman</h5>
            </div>
            <div class="card-body ">
                <form action="../../action/announcements/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="announcements_imageInput" class="form-label">Tambah Gambar</label>
                        <input type="file" name="announcements_image" class="form-control" id="announcements_imageInput" required></input>
                    </div>

                    <div class="mb-3">
                        <label for="announcements_titleInput" class="form-label">Judul</label>
                        <input type="text" name="announcements_title" class="form-control" id="announcements_titleInput" placeholder="Masukan judul..." required>
                    </div>

                    <div class="mb-3">
                        <label for="announcements_descriptionInput" class="form-label">Deskripsi</label>
                        <input type="text" name="announcements_description" class="form-control" id="announcements_descriptionInput"  placeholder="Masukan deskripsi..."  required></input>
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