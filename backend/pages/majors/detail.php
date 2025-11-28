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
                <h5>Detail Data majors</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/majors/show.php';
                ?>
                <form>

                    
                    <div class="mb-3">
                        <label for="majors_nameInput" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="<?=$majors->majors_name?>" disabled>
                    </div>
                    
                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/majors/<?=$majors->majors_image?>" alt="" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="majors_descriptionInput" class="form-label">Deskripsi</label>
                        <textarea disabled name="majors_description" class="form-control" id="majors_descriptionInput" rows="9" ><?=$majors->majors_description?></textarea>  
                    </div>

                    <div class="mb-3">
                        <label for="headInput" class="form-label">Kepala Jurusan</label>
                        <input type="text" class="form-control" value="<?=$majors->head?>" disabled>
                    </div>


                    
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