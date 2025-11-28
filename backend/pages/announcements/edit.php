<?php
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'announcements';
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
                <h5>Edit Data Pengumuman</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/announcements/show.php';
                ?>
                <form action="../../action/announcements/update.php?id=<?= $announcements->id?>" method="POST" enctype="multipart/form-data"> 
                 
                    <div class="mb-3">
                        <label for="announcements_titleInput" class="form-label">Judul</label>
                        <input type="text" name="announcements_title" class="form-control" id="announcements_titleInput" placeholder="Masukan judul..." required value="<?=$announcements->announcements_title?>">
                    </div>
                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/announcements/<?=$announcements->announcements_image?>" alt="announcements_image">
                        <label for="announcements_imageInput" class="form-label"></label>
                        <input type="file" name="announcements_image" class="form-control" id="announcements_imageInput"></input>
                    </div>
                    
                    <div class="mb-3">
                        <label for="announcements_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="announcements_description" id="announcements_description" class="form-control" placeholder="Masukan deskripsi..." rows="5"><?=$announcements->announcements_description?></textarea>
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