    <?php
    
$current_dir = 'blog';
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
                <h5>Tamnbah Data Berita</h5>
            </div>
            <div class="card-body">
                <form action="../../action/blog/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput" required>
                    </div>
 
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Judul</label>
                        <input type="text" name="title" class="form-control" id="titleInput" placeholder="Masukan Judul..."  required>
                    </div>

                    <div class="mb-3">
                        <label for="contentInput" class="form-label">Konten</label>
                        <textarea name="content" id="content" class="form-control" placeholder="Masukan Konten..." rows="5" ></textarea>
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