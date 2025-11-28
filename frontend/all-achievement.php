<?php
include '../config/connection.php';
include 'partials/header.php';

// Ambil semua data prestasi
$query = mysqli_query($connect, "SELECT * FROM achievements ORDER BY id DESC") 
          or die(mysqli_error($connect));
$achievements = [];
while ($row = mysqli_fetch_assoc($query)) {
  $achievements[] = $row;
}
?>

<section id="all-achievement" class="services section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Semua Prestasi</h2>
    <p>Kumpulan prestasi siswa/i SMKN 3 Banjar</p>
  </div>

  <div class="container">
    <a href="index.php#achievement" class="btn btn-secondary mb-4">&larr; Kembali</a>

    <!-- Form Search -->
    <div class="mb-4">
      <input type="text" id="searchAchievement" class="form-control" placeholder="Ketik untuk mencari prestasi...">
    </div>

    <div class="row gy-4" id="achievementList">
      <?php foreach ($achievements as $row): ?>
        <div class="col-lg-4 col-md-6 achievement-item">
          <div class="card h-100 shadow-sm border-0">
            <!-- Gambar -->
            <img src="../storages/achievement/<?= htmlspecialchars($row['image']) ?>" 
                 class="card-img-top" 
                 alt="<?= htmlspecialchars($row['title']) ?>" 
                 style="height: 200px; object-fit: cover;">

            <!-- Isi Card -->
            <div class="card-body">
              <h5 class="card-title"><?= htmlspecialchars($row['title']) ?></h5>
              <p class="card-text"><?= htmlspecialchars(substr($row['description'], 0, 100)) ?>...</p>
            </div>

            <!-- Footer Card -->
            <div class="card-footer bg-white border-0">
              <a href="detail-achievements.php?id=<?= $row['id'] ?>" 
                 class="btn btn-sm btn-outline-success">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const input = document.getElementById("searchAchievement");
  const items = document.querySelectorAll(".achievement-item");

  input.addEventListener("keyup", function() {
    const keyword = this.value.toLowerCase();
    items.forEach(item => {
      const text = item.innerText.toLowerCase();
      if (text.includes(keyword)) {
        item.style.display = "";
      } else {
        item.style.display = "none";
      }
    });
  });
});
</script>
