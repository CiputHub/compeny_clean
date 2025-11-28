<?php
include '../config/connection.php';
include 'partials/header.php';

// Search
$search = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';

$qUpdate = "SELECT * FROM galleries";
if ($search != '') {
    $qUpdate .= " WHERE title LIKE '%$search%'";
}
$qUpdate .= " ORDER BY id DESC";
$result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Galeri Selengkapnya</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .gallery-card {
      transition: transform .2s, box-shadow .2s;
      border-radius: .5rem;
      overflow: hidden;
    }
    .gallery-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 6px 20px rgba(0,0,0,.15);
    }
    .card-img-top {
      height: 230px;
      object-fit: cover;
    }
  </style>
</head>
<body>
<div class="container py-5">

  <a href="index.php#portfolio" class="btn btn-secondary mb-4">&larr; Kembali</a>
  <h2 class="mb-4">Galeri Selengkapnya</h2>

 <!-- Search -->
<input type="text" id="searchInput" 
       class="form-control mb-4" 
       placeholder="Cari judul...">

<div class="row gy-4" id="gallery-list">
  <?php while ($item = $result->fetch_object()): ?>
    <div class="col-lg-4 col-md-6">
      <div class="card gallery-card h-100 shadow-sm">
        <img src="../storages/galleries/<?= $item->image ?>" class="card-img-top" alt="">
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?= htmlspecialchars($item->title ?? 'Tanpa Judul') ?></h5>
        </div>
      </div>
    </div>
  <?php endwhile; ?>
</div>


</div>
<script>
document.getElementById('searchInput').addEventListener('keyup', function() {
    let query = this.value.trim();

    fetch('search-galeri.php?search=' + encodeURIComponent(query))
        .then(res => res.json())
        .then(data => {
            let html = '';
            if (data.length > 0) {
                data.forEach(item => {
                    html += `
                        <div class="col-lg-4 col-md-6">
                          <div class="card gallery-card h-100 shadow-sm">
                            <img src="../storages/galleries/${item.image}" class="card-img-top" alt="">
                            <div class="card-body d-flex flex-column">
                              <h5 class="card-title">${item.title}</h5>
                            </div>
                          </div>
                        </div>
                    `;
                });
            } else {
                html = `<p class="text-muted">Tidak ada hasil.</p>`;
            }
            document.getElementById('gallery-list').innerHTML = html;
        });
});
</script>


</body>
</html>
