<?php
include '../config/connection.php';

// Ambil about (profile sekolah)
$qSchool = "SELECT * FROM abouts LIMIT 1";
$resSchool = mysqli_query($connect, $qSchool) or die(mysqli_error($connect));
$school = mysqli_fetch_object($resSchool);

// Ambil 5 pengumuman terbaru
$qAnnouncements = "SELECT * FROM announcements ORDER BY id DESC LIMIT 5";
$resAnn = mysqli_query($connect, $qAnnouncements) or die(mysqli_error($connect));
?>
<section id="about" class="about section py-5">

  <div class="container section-title" data-aos="fade-up">
        <!-- <span>About Us<br></span> -->
        <h1>Tentang Kami</h1>
        <p></p>
      </div><!-- End Section Title -->

    <div class="container">
    <div class="row">
      
      <!-- KIRI: VIDEO YOUTUBE -->
      <div class="col-lg-6 mb-4">
        <div class="card shadow-lg border-0">
          <div class="card-body">
            <h4 class="card-title mb-3">Profile SMK Negeri 3 Banjar</h4>
            <div class="ratio ratio-16x9">
              <iframe 
                src="https://www.youtube.com/embed/FW1Ywl82DyM?si=ePsxBVnOCgtEXm6C" 
                title="YouTube video" 
                allowfullscreen>
              </iframe>
            </div>
            <p class="mt-3">
              SMK Negeri 3 Banjar merupakan sekolah kejuruan yang memiliki enam jurusan 
              dan berbagai macam laboratorium untuk praktik.
            </p>
          </div>
        </div>
      </div>

    
<div class="col-lg-6 mb-4">
  
  <!-- ✅ Card Slogan (pindah ke atas) -->
  <div class="card shadow-lg border-0 mb-4">
    <div class="card-body text-center">
      <h5 class="fw-bold mb-3">🎯 Slogan Sekolah</h5>
      <p class="lead text-primary fw-semibold">
        "<?= $school->school_tagline ?>"
      </p>
    </div>
  </div>

  <!-- 📢 Card Pengumuman -->
  <div class="card shadow-lg border-0 mb-4">
    <div class="card-body">
      <h4 class="card-title mb-3">📢 Pengumuman Sekolah</h4>

      <?php while ($item = mysqli_fetch_object($resAnn)) { ?>
        <div class="mb-3 pb-2 border-bottom">
          <h6>
            <a href="announcement_detail.php?id=<?= $item->id ?>" class="text-dark">
              <?= $item->announcements_title ?>
            </a>
          </h6>
          <small class="text-muted">
            <?= date("d M Y", strtotime($item->created_at ?? 'now')) ?> | Pengumuman
          </small>
        </div>
      <?php } ?>

      <div class="text-end mt-3">
        <a href="announcements_all.php" class="btn btn-outline-success btn-sm">Lihat Semua</a>
      </div>
    </div>
  </div>

</div>


    </div>
  </div>
</section>