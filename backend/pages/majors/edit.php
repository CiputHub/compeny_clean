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
                <h5>Edit Data majors</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/majors/show.php';
                ?>
                <form action="../../action/majors/update.php?id=<?=$majors->id?>" method="POST" enctype="multipart/form-data"> 
                    
                    <div class="mb-3">
                        <label for="majors_nameInput" class="form-label">Nama</label>
                        <input type="text" name="majors_name" class="form-control" id="majors_nameInput" placeholder="Masukan judul..." required value="<?=$majors->majors_name?>">
                    </div>
                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/majors/<?=$majors->majors_image?>" alt="">
                        <label for="majors_imageInput" class="form-label"></label>
                        <input type="file" name="majors_image" class="form-control" id="majors_imageInput"></input>
                    </div>
                    
                    
                    <div class="mb-3">
                        <label for="majors_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea name="majors_description" id="majors_description" class="form-control" placeholder="Masukan Deskripsi..." rows="9"><?=$majors->majors_description?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="headInput" class="form-label">Kepala Jurusan</label>
                        <input type="text" name="head" class="form-control" id="headInput" placeholder="Masukan Kepala Jurusan..."  required value="<?=$majors->head?>">
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