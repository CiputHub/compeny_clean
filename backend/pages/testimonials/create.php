    <?php
    $current_dir = 'testimonials';
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
                <h5>Tambah Data Testimoni</h5>
            </div>
            <div class="card-body">
                <form action="../../action/testimonials/store.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="imageInput" class="form-label">Pilih Gambar</label>
                        <input type="file" name="image" class="form-control" id="imageInput" required>
                    </div>
 
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="nameInput" placeholder="Masukan Nama..."  required>
                    </div>
                    <div class="mb-3">
                        <label for="statusInput" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" id="statusInput" placeholder="Masukan Status..."  required>   
                    </div>
                    <div class="mb-3">
                        <label for="messageInput" class="form-label">Pesan</label>
                        <textarea name="message" id="messageInput" class="form-control" placeholder="Masukan pesan..." rows="5" ></textarea>
                    </div>

                    <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select name="rating" id="rating" class="form-control" required>
                        <option value="5">★★★★★ (5)</option>
                        <option value="4">★★★★ (4)</option>
                        <option value="3">★★★ (3)</option>
                        <option value="2">★★ (2)</option>
                        <option value="1">★ (1)</option>
                    </select>
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