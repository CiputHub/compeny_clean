<!-- <?php
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
                <h5>Detail Data contact</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/contact/show.php';
                ?>
                <form>

                    <div class="mb-3">
                        <label for="nameInput" class="form-label">Nama</label>
                        <input type="name" class="form-control" value="<?=$contact->name?>" disabled>
                    </div>
    
                    <div class="mb-3">
                        <label for="emailInput" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" value="<?=$contact->email?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="subjectInput" class="form-label">tempat</label>
                        <input type="text" class="form-control" value="<?=$contact->subject?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="massageInput" class="form-label">deskripsi</label>
                        <input type="text" class="form-control" value="<?=$contact->massage?>" disabled>
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
    ?> -->