<?php

session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$current_dir = 'contact';
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
                <h5>Edit Data contact</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/contact/show.php';
                ?>
                <form action="../../action/contact/update.php?id=<?= $contact->id?>" method="POST" enctype="multipart/form-data"> 

                    <div class="mb-3">
                        <img class="w-25" src="../../../storages/contact/<?=$contact->img?>" alt="img">
                        <label for="imgInput" class="form-label"></label>
                        <input type="file" name="img" class="form-control" id="imgInput"></input>
                    </div>

                    <div class="mb-3">
                        <label for="contactInput" class="form-label">Kontak</label>
                        <input type="text" name="contact" class="form-control" id="contactInput" placeholder="Masukan Kontak..." required value="<?=$contact->contact?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="link_urlInput" class="form-label">Link</label>
                        <textarea name="link_url" id="link_url" class="form-control" placeholder="Masukan Deskripsi..." rows="5"><?=$contact->link_url?></textarea>
                    </div>

                      <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="emailInput" placeholder="Masukan Email..." required value="<?=$contact->email?>">
                    </div>

                        <div class="mb-3">
                            <label for="link_mapInput" class="form-label">tautan map</label>
                            <input type="text" name="link_map" class="form-control" id="link_mapInput" placeholder="Masukan tautan map..." required value="<?=$contact->link_map?>">
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