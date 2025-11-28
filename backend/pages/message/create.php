<?php
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
                <h5>Tambah Data Pesan</h5>
            </div>
            <div class="card-body">
                <form action="../../action/contact/store.php" method="POST" enctype="multipart/form-data">
                
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama</label>
                        <input type="name" name="name" class="form-control" id="nameInput" required></input>
                    </div>

                     <div class="mb-3">
                        <label for="emailInput" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="emailInput" placeholder="Masukan email Sekarang..."  required>
                    </div>

                    <div class="mb-3">
                        <label for="subjectInput" class="form-label">Subjek</label>
                        <input type="text" name="subject" class="form-control" id="subjectInput" placeholder="Masukan subjek..."  required>
                    </div>
       
                    <div class="mb-3">
                        <label for="massageInput" class="form-label">pesan</label>
                        <input type="text" name="massage" class="form-control" id="descriptionInput" placeholder="Masukan pesan..."  required>
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