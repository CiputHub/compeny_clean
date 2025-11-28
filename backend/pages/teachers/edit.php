<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'teachers';
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
                <h5>Edit Data teachers</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/teachers/show.php';
                ?>
                <form action="../../action/teachers/update.php?id=<?= $teachers->id?>" method="POST" enctype="multipart/form-data"> 

                    
                    <div class="mb-3">
                        <label for="teachers_nameInput" class="form-label">Nama</label>
                        <input type="text" name="teachers_name" class="form-control" id="teachers_nameInput" placeholder="Masukan nama..." required value="<?=$teachers->teachers_name?>">
                    </div>
                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/teachers/<?=$teachers->teachers_photo?>" alt="teachers_photo">
                        <label for="teachers_photoInput" class="form-label"></label>
                        <input type="file" name="teachers_photo" class="form-control" id="teachers_photoInput"></input>
                    </div>
                    
                    <div class="mb-3">
                        <label for="teachers_majorInput" class="form-label">Jurusan</label>
                        <textarea name="teachers_major" id="teachers_major" class="form-control" placeholder="Masukan Jurusan..." rows="5"><?=$teachers->teachers_major?></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="gender" class="form-label">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="form-control" required value="<?=$teachers->gender?>">
                        <option value="">-- Pilih Gender --</option>
                        <option  value="Laki-laki"  <?= ($teachers->gender == 'Laki-laki')? 'selected' : ''?>>Laki-laki</option>
                        <option  value="Perempuan"  <?= ($teachers->gender == 'Perempuan')? 'selected' : ''?>>Perempuan</option>
                    </select>
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