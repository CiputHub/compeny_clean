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
                <h5>Detail Data Tanay Jawab</h5>
            </div>
            <div class="card-body">
                <?php
                include '../../action/qna/show.php';
                ?>
                <form>


    
                    <div class="mb-3">
                        <label for="tanyaInput" class="form-label">Pertanyaan</label>
                        <input type="text" class="form-control" value="<?=$qna->tanya?>" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="jawabInput" class="form-label">Jawaban</label>
                        <textarea type="text" class="form-control"  rows="5" disabled><?=$qna->jawab?></textarea>  
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