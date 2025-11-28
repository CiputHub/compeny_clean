<?php
$current_dir = 'qna';
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
                <h5>Tambah Data Tanya Jawab</h5>
            </div>
            <div class="card-body">
                <form action="../../action/qna/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tanyaInput" class="form-label">Tanya</label>
                        <input type="text" name="tanya" class="form-control" id="tanyaInput" placeholder="Masukan pertanyaan anda..." required>
                    </div>

                     <div class="mb-3">
                        <label for="jawabInput" class="form-label">Jawab</label>
                        <input type="text" name="jawab" class="form-control" id="jawabInput" placeholder="Masukan jawaban anda..." required>
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