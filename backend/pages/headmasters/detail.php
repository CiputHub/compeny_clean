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
 <div id="layoutSidenav_headmaster_description">
 <div class="row px-5 mt-5 justify-headmaster_description-center">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data headmasters</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/headmasters/show.php';
                ?>
                <form action="../../action/headmasters/update.php?id=<?= $headmasters->id?>" method="POST" enctype="multipart/form-data"> 

                    
                    
                    <div class="mb-3">
                        <label for="headmaster_nameInput" class="form-label">Judul</label>
                        <input type="text" name="headmaster_name" class="form-control" id="headmaster_nameInput" placeholder="Masukan Judul..." required value="<?=$headmasters->headmaster_name?>" disabled>
                    </div>
                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/headmasters/<?=$headmasters->headmaster_photo?>" alt="headmaster_photo">
                        <label for="headmaster_photoInput" class="form-label" disabled></label>
                    </div>
                    
                    <div class="mb-3">
                        <label for="headmaster_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="headmaster_description" id="headmaster_description" class="form-control" disabled placeholder="Masukan Deskripsi..." rows="15"><?=$headmasters->headmaster_description?></textarea>
                    </div>
                    
                    
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