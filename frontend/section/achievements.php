<?php
include '../config/connection.php';

// Ambil 3 blog terbaru
$qHeadmaster = "SELECT * FROM achievements ORDER BY id DESC LIMIT 3";
$result_headmaster = mysqli_query($connect, $qHeadmaster) or die(mysqli_error($connect));
?>
<section id="achievement" class="services section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <!-- <span>Achievement</span> -->
    <h2>Prestasi</h2>
    <p>Beberapa pencapaian siswa/i SMKN 3 Banjar</p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      <?php while ($item = $result_headmaster->fetch_object()): ?>

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
          <div class="service-item position-relative">
            
            <div class="mb-3">
              <img src="../storages/achievement/<?php echo $item->image; ?>" alt="<?php echo $item->title; ?>" 
                   class="img-fluid rounded" style="max-height: 150px; object-fit: cover;">
            </div>
            
            <h3><?php echo $item->title; ?></h3>
            <p><?php echo $item->description; ?></p>

          </div>
        </div>
      <?php endwhile; ?>

    </div>
    
    <!-- Tombol Lihat Selengkapnya -->
    <div class="text-center mt-4">
      <a href="all-achievement.php" class="btn btn-success px-4 py-2">Lihat Selengkapnya</a>
    </div>
  </div>

</section>
