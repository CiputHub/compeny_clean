  <?php
  include 'partials/header.php';

  $qAbouts = "SELECT * FROM abouts";
  $result_about = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
  $itemAbout = $result_about->fetch_object();  

  $qContact = "SELECT * FROM contacts";
  $result_contact = mysqli_query($connect, $qContact) or die(mysqli_error($connect));
  $itemContact = $result_contact->fetch_object(); 

  $qSocialmedia = "SELECT * FROM social_media";
  $result_social_media = mysqli_query($connect, $qSocialmedia) or die(mysqli_error($connect));
  $itemSocialmedia = $result_social_media->fetch_object(); 

  $qSocialmedia = "SELECT * FROM social_media";
  $result_social_media = mysqli_query($connect, $qSocialmedia) or die(mysqli_error($connect));

  $qGalleryFooter = "SELECT * FROM galleries ORDER BY id DESC LIMIT 2";
  $resultGalleryFooter = mysqli_query($connect, $qGalleryFooter) or die(mysqli_error($connect));

  ?>
  <footer id="footer" class="footer bg-success text-light pt-5">
    <div class="container footer-top">
      <div class="row gy-4 text-center text-md-start">

        <!-- Tentang Sekolah (Lebih Lebar) -->
        <div class="col-lg-5 col-md-12">
          <h2 class="text-light mb-3"><?= $itemAbout->school_name?></h2>
          <p><strong>Alamat:</strong> <?= $itemAbout->alamat?></p>
          <p><strong>Nomor:</strong> <?= $itemContact->contact?></p>
          <p><strong>Email:</strong> <?= $itemContact->email ?></p>
        </div>

        <!-- Tautan Berguna -->
        <div class="col-lg-2 col-md-6">
          <h5 class="text-light mb-3">Tautan Berguna</h5>
          <ul class="list-unstyled">
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#" class="text-light text-decoration-none">Home</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#about" class="text-light text-decoration-none">Tentang Kami</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#blog" class="text-light text-decoration-none">Berita</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#achievement" class="text-light text-decoration-none">Prestasi</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#portfolio" class="text-light text-decoration-none">Galeri</a></li>
          </ul>
        </div>

        <!-- Tautan Lainnya -->
        <div class="col-lg-2 col-md-6">
          <h5 class="text-light mb-3">Tautan Lainnya</h5>
          <ul class="list-unstyled">
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#visi-misi" class="text-light text-decoration-none">Visi Misi</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#sambutan" class="text-light text-decoration-none">Sambutan</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#testimonials" class="text-light text-decoration-none">Testimoni</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#majors" class="text-light text-decoration-none">Jurusan</a></li>
            <li><i class="bi bi-chevron-right me-1"></i> <a href="#team" class="text-light text-decoration-none">Guru</a></li>
          </ul>
        </div>

        <!-- Sosial Media + Galeri -->
        <div class="col-lg-3 col-md-12">
          <h5 class="text-light mb-2">Follow Kami</h5>
          <p class="mb-2"><?= $itemSocialmedia->title?></p>
          <div class="d-flex gap-2 mb-4 flex-wrap justify-content-center justify-content-md-start">
            <?php while($s = $result_social_media->fetch_object()): ?>
              <a href="<?= $s->link_url ?>" target="_blank" class="btn btn-outline-light btn-sm rounded-circle">
                <i class="<?= $s->icon ?>"></i>
              </a>
            <?php endwhile; ?>
          </div>

          <h5 class="text-light mb-2">Galeri Sekolah</h5>
          <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start">
            <?php while($g = $resultGalleryFooter->fetch_object()): ?>
              <a href="../storages/galleries/<?= $g->image ?>" target="_blank">
                <img src="../storages/galleries/<?= $g->image ?>" 
                    alt="<?= htmlspecialchars($g->title) ?>" 
                    class="img-fluid rounded shadow-sm"
                    style="width: 60px; height: 60px; object-fit: cover;">
              </a>
            <?php endwhile; ?>
          </div>
          <small class="text-light d-block mt-2">Klik untuk lihat lebih besar</small>
        </div>

      </div>
    </div>

    <div class="container text-center mt-4 border-top pt-3">
      <p class="mb-0">© <strong class="sitename">SMKN 3 Banjar</strong> | Semua Hak Dilindungi Undang-undang</p>
    </div>
  </footer>

