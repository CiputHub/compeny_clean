<?php
// koneksi database
include '../config/connection.php';


// Ambil data visi
$qVisi = mysqli_query($connect, "SELECT text FROM visi_missions WHERE category='visi' LIMIT 1");
$dataVisi = mysqli_fetch_assoc($qVisi);

// Ambil data misi
$qMisi = mysqli_query($connect, "SELECT text FROM visi_missions WHERE category='misi'");
?>
<section id="visi-misi" class="section py-5 bg-light">
  <div class="container" data-aos="fade-up">

    <!-- Judul -->
    <div class="section-title text-center mb-5">
      <h2 class="fw-bold">
        <i class="text-success"></i> Visi & Misi
      </h2>
      <p class="text-muted">Berisi tentang visi dan misi SMKN 3 Banjar</p>
      <hr class="w-25 mx-auto border-2 border-success">
    </div>

    <!-- Tabs -->
    <ul class="nav nav-pills justify-content-center mb-4 custom-pills" id="pills-tab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-visi-tab" data-bs-toggle="pill" 
                data-bs-target="#pills-visi" type="button" role="tab">
          <i class="bi bi-list-check"></i> Visi
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-misi-tab" data-bs-toggle="pill" 
                data-bs-target="#pills-misi" type="button" role="tab">
          <i class="bi bi-list-check"></i> Misi
        </button>
      </li>
    </ul>

    <!-- Content -->
    <div class="tab-content" id="pills-tabContent">

      <!-- VISI -->
      <div class="tab-pane fade show active" id="pills-visi" role="tabpanel">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-body">
            <h4 class="fw-bold mb-3 text-success">Visi</h4>
            <blockquote class="blockquote">
              <p class="mb-0 fs-5 fst-italic">
                <?= nl2br($dataVisi['text']); ?>
              </p>
            </blockquote>
          </div>
        </div>
      </div>

      <!-- MISI -->
      <div class="tab-pane fade" id="pills-misi" role="tabpanel">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-body">
            <h4 class="fw-bold mb-3 text-success">Misi</h4>
            <ul class="list-unstyled">
              <?php while ($row = mysqli_fetch_assoc($qMisi)): ?>
                <li class="d-flex align-items-start mb-3 fst-italic ">
                  <i class="bi text-success me-2 mt-1"></i>
                  <span><?= nl2br($row['text']); ?></span>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>

    </div>

  </div>
</section>

<!-- Custom Style -->
<style>
#visi-misi .card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
#visi-misi .card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}
/* Paksa nav-pills active tetap hijau */
.nav-pills .nav-link.active,
.nav-pills .show>.nav-link {
  background-color: #198754 !important; /* hijau bootstrap success */
  color: #fff !important;
}
.custom-pills .nav-link {
  color: #444;
  border-radius: 25px;
  padding: 10px 25px;
  margin: 0 8px;
  font-weight: 500;
  background: #f1f1f1;
  transition: all 0.3s ease;
}
.custom-pills .nav-link.active {
  background: #198754;
  color: #fff !important;
}
.custom-pills .nav-link:hover {
  background: #157347;
  color: #fff !important;
}
</style>
