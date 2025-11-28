<?php
$current_dir = 'testimonials';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<!-- contect -->
 <div id="layoutSidenav_content">
 <div class="row px-5 mt-5 justify-content-center">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h5>Detail Data testimonials</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/testimonials/show.php';
                ?>
                <form action="../../action/testimonials/update.php?id=<?= $testimonials->id?>" method="POST" enctype="multipart/form-data"> 

                    <div class="mb-3">
                        <h6>Gambar</h6>
                        <img class="w-25" src="../../../storages/testimonials/<?=$testimonials->image?>" alt="image">
                        <label for="imageInput" class="form-label" disabled></label>
                    </div>

                    
                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="nameInput" placeholder="Masukan judul..." required value="<?=$testimonials->name?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="statusInput" class="form-label">Status</label>
                        <input type="text" name="status" class="form-control" id="statusInput" placeholder="Masukan status..." required value="<?=$testimonials->status?>" disabled>        
                    </div>

                    <div class="mb-3">
                        <label for="messageInput" class="form-label">Pesan</label>
                        <textarea name="message" id="messageInput" class="form-control" placeholder="Masukan pesan..." rows="5" disabled><?=$testimonials->message?></textarea>
                    </div>

                      <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <select name="rating" id="rating" class="form-control" disabled>
                            <option value="5" <?= ($testimonials->rating == 5) ? 'selected' : '' ?>>★★★★★ (5)</option>
                            <option value="4" <?= ($testimonials->rating == 4) ? 'selected' : '' ?>>★★★★ (4)</option>
                            <option value="3" <?= ($testimonials->rating == 3) ? 'selected' : '' ?>>★★★ (3)</option>
                            <option value="2" <?= ($testimonials->rating == 2) ? 'selected' : '' ?>>★★ (2)</option>
                            <option value="1" <?= ($testimonials->rating == 1) ? 'selected' : '' ?>>★ (1)</option>
                        </select>
                    </div>
                    
                    
                    <!-- <button type="submit" class="btn btn-primary me-3" name="tombol">Edit</button> -->
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