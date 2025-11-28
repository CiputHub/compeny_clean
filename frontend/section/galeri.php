<?php
include '../config/connection.php';

// Ambil 3 galeri terbaru
$qUpdate = "SELECT * FROM galleries ORDER BY id DESC LIMIT 3";
$result  = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
?>

<section id="portfolio" class="portfolio section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <span>Galeri Sekolah</span>
    <h2>Galeri</h2>
    <p>Berisi gambar-gambar</p>
  </div>
  <!-- End Section Title -->

  <div class="container">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
      
      <!-- Portfolio Filters (jika diperlukan) -->
      <!-- 
      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <li data-filter=".filter-app">App</li>
        <li data-filter=".filter-product">Product</li>
        <li data-filter=".filter-branding">Branding</li>
        <li data-filter=".filter-books">Books</li>
      </ul>
      -->
      <!-- End Portfolio Filters -->

      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        <?php while ($item = $result->fetch_object()): ?>
          <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
            <div class="card shadow-sm border-0 h-100">
              <img 
                src="../storages/galleries/<?php echo $item->image; ?>" 
                alt="" 
                loading="lazy" 
                style="width:100%; height:250px; object-fit:cover; display:block; border-radius:8px 8px 0 0;"
              >
              <div class="card-body">
                <p class="card-text text-muted" style="min-height: 60px;">
                  <?= htmlspecialchars(substr($item->title, 0, 80)) ?>...
                </p>
                <a 
                  href="../storages/galleries/<?= $item->image ?>" 
                  class="glightbox preview-link btn btn-sm btn-success" 
                  title="<?= htmlspecialchars($item->title) ?>" 
                  data-gallery="portfolio-gallery-app"
                >
                  <i class="bi bi-zoom-in"></i> Lihat
                </a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
        <!-- End Portfolio Item -->
      </div>
      <!-- End Portfolio Container -->

      <div class="text-center mt-4">
        <a href="all-galeri.php" class="btn btn-success">Lihat Selengkapnya</a>
      </div>
    </div>
  </div>
</section>
