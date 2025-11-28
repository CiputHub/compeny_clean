<?php
$current_dir = 'galleries';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!-- contect -->
 <div id="layoutSidenav_content">
 <div class="row px-5 mt-5 justify-content-center">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data galeri</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/galleries/show.php';
                ?>
                <form action="../../action/galleries/update.php?id=<?= $galleries->id?>" method="POST" enctype="multipart/form-data"> 

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/galleries/<?=$galleries->image?>" alt="image">
                        <label for="imageInput" class="form-label" disabled></label>
                    </div>
                    
                     <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput" placeholder="Masukan judul..." required value="<?=$galleries->title?>" disabled></input>
                    </div>
                    
                    <!-- <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" disabled placeholder="Masukan Deskripsi..." rows="5"><?=$galleries->description?></textarea>
                    </div>

                      <div class="mb-3">
                        <label for="dateInput" class="form-label">Tanggal</label>
                        <input type="date" name="date" class="form-control" id="dateInput" required value="<?=$galleries->date?>" disabled>
                    </div> -->
                    
                    
                    
                    <!-- <button type="submit" class="btn btn-primary me-3" name="tombol">Edit</button> -->
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