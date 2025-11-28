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
                <h5>Edit Data visi misi</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/visi_mission/show.php';
                ?>
                <form action="../../action/visi_mission/update.php?id=<?=$visi_mission->id?>" method="POST" enctype="multipart/form-data"> 

                       <div class="mb-3">
                        <label for="categoryInput" class="form-label">Kategori</label>
                        <select class="form-select"  id="categoryInput" aria-label="Default select example" name="category" required value="<?=$visi_mission->category?>">
                            <option disabled <?= empty ($visi_mission->category)? 'selected' : ''?>>
                            Pilih kategori</option>
                            <option value="visi"  <?= ($visi_mission->category == 'visi')? 'selected' : ''?>>visi</option>
                            <option value="misi" <?= ($visi_mission->category == 'misi')? 'selected' : ''?>>misi</option>
                        </select>
                      </div>
                      
                    <div class="mb-3">
                        <label for="textInput" class="form-label">Text</label>
                       <textarea name="text" id="text" class="form-control" placeholder="Masukan alamat..." rows="5"><?=$visi_mission->text?></textarea>
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