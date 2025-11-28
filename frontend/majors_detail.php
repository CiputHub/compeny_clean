<?php
include '../config/connection.php';
include 'partials/header.php';


$id = intval($_GET['id']);
$qDetail = "SELECT * FROM majors WHERE id = $id";
$result = mysqli_query($connect, $qDetail) or die(mysqli_error($connect));
$data = mysqli_fetch_assoc($result);
?>

<section id="majors-detail" class="section light-background py-5">
  <div class="container">
    <!-- Judul -->
    <div class="text-center mb-5">
      <h2 class="fw-bold"><?php echo $data['majors_name']; ?></h2>
      <p class="text-muted">Profil Program Keahlian</p>
    </div>

    <div class="row align-items-center">
      <!-- Kolom kiri: gambar / slider -->
      <div class="col-lg-6 mb-4">
        <div id="majorSlider" class="carousel slide shadow rounded" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../storages/majors/<?php echo $data['majors_image']; ?>" 
                   class="d-block w-100 rounded" 
                   style="max-height:400px; object-fit:contain;" 
                   alt="<?php echo $data['majors_name']; ?>">
            </div>
            <!-- kalau nanti ada tabel gallery majors_gallery, bisa looping disini -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#majorSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#majorSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>

      <!-- Kolom kanan: detail jurusan -->
      <div class="col-lg-6">
        <div class="card border-0 shadow p-4">
          <h4 class="fw-semibold mb-3">Kepala Program Keahlian</h4>
          <p class="mb-4"><?php echo $data['head']; ?></p>

          <h4 class="fw-semibold mb-3">Deskripsi</h4>
          <p class="text-justify"><?php echo $data['majors_description']; ?></p>

          <!-- tombol opsional -->
          <div class="mt-4">
            <a href="index.php#majors" class="btn btn-outline-success">
              ← Kembali ke Jurusan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
