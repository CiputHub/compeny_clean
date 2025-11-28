<?php
include '../config/connection.php';

// Ambil semua QnA
$qUpdate = "SELECT * FROM qna ORDER BY id";
$result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
?>

<section id="qna" class="qna section py-5">
  <div class="container">
    <h2 class="text-center mb-4">Seputar Tanya Jawab</h2>

    <div class="accordion" id="accordionQnA">
      <?php while ($item = $result->fetch_object()): ?>
        <?php $collapseId = "collapse".$item->id; ?>
        <?php $headingId  = "heading".$item->id; ?>

        <div class="accordion-item">
          <h2 class="accordion-header" id="<?=$headingId?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$collapseId?>" aria-expanded="false" aria-controls="<?=$collapseId?>">
              <?=$item->tanya?>
            </button>
          </h2>
          <div id="<?=$collapseId?>" class="accordion-collapse collapse" aria-labelledby="<?=$headingId?>" data-bs-parent="#accordionQnA">
            <div class="accordion-body">
              <?=$item->jawab?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
