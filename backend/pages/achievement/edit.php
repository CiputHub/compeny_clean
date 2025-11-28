<?php

$current_dir = 'achievement';
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
                <h5>Edit Data Prestasi</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/achievement/show.php';
                ?>
                <form action="../../action/achievement/update.php?id=<?= $achievement->id?>" method="POST" enctype="multipart/form-data"> 

                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/achievement/<?=$achievement->image?>" alt="image">
                        <label for="imageInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput"></input>
                    </div>

                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput" placeholder="Masukan Kode Pos..." required value="<?=$achievement->title?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" placeholder="Masukan alamat..." rows="5"><?=$achievement->description?></textarea>
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