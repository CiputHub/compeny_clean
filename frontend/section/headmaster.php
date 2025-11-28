<?php
include '../config/connection.php';

$qHeadmaster = "SELECT * FROM headmasters";
$result = mysqli_query($connect, $qHeadmaster) or die(mysqli_error($connect));
$item = $result->fetch_object();

// Batasi teks (misalnya 600 karakter)
$limit   = 650;
$full    = $item->headmaster_description;
$excerpt = substr($full, 0, $limit);
?>

<section id="sambutan" class="py-5">
  <div class="container my-5">
    <!-- Card Sambutan -->
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
      <div class="row g-0 align-items-center">

        <!-- Foto Kepala Sekolah -->
        <div class="col-md-4 text-center p-5 bg-light">
          <div class="position-relative d-inline-block">
            <img src="../storages/headmasters/<?= $item->headmaster_photo?>" 
                 alt="Kepala Sekolah"
                 class="img-fluid shadow-lg">
          </div>
          <h5 class="mt-4 mb-0 fw-bold"><?= $item->headmaster_name ?></h5>
          <small class="text-muted">Kepala Sekolah</small>
        </div>

        <!-- Sambutan -->
        <div class="col-md-8 p-5">
          <h4 class="fw-bold mb-3 text-success">Sambutan Kepala Sekolah</h4>

          <!-- Excerpt -->
          <p id="excerpt" class="text-justify" style="line-height: 1.9; font-size: 1rem;">
            <?= nl2br($excerpt) ?>...
          </p>

          <!-- Full Text (hidden by default) -->
          <div id="fullDesc" class="collapse">
            <p class="text-justify" style="line-height: 1.9; font-size: 1rem;">
              <?= nl2br($full) ?>
            </p>
          </div>

          <!-- Tombol Toggle -->
          <button id="toggleBtn" 
                  class="btn btn-link p-0 text-success fw-bold" 
                  type="button" 
                  data-bs-toggle="collapse" 
                  data-bs-target="#fullDesc" 
                  aria-expanded="false" 
                  aria-controls="fullDesc">
            Baca Selengkapnya
          </button>
        </div>

      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
  var excerpt = document.getElementById("excerpt");
  var fullDesc = document.getElementById("fullDesc");
  var toggleBtn = document.getElementById("toggleBtn");

  fullDesc.addEventListener("shown.bs.collapse", function () {
    excerpt.style.display = "none"; // sembunyikan excerpt
    toggleBtn.innerText = "Sembunyikan";
  });

  fullDesc.addEventListener("hidden.bs.collapse", function () {
    excerpt.style.display = "block"; // tampilkan excerpt lagi
    toggleBtn.innerText = "Baca Selengkapnya";
  });
});
</script>
