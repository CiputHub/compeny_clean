<?php
include '../config/connection.php';

// filter pencarian
$search = "";
if(isset($_GET['q'])){
  $search = mysqli_real_escape_string($connect, $_GET['q']);
  $qTeam = "SELECT * FROM teachers 
            WHERE teachers_name LIKE '%$search%' 
            OR teachers_major LIKE '%$search%'";
} else {
  $qTeam = "SELECT * FROM teachers";
}

$result = mysqli_query($connect, $qTeam);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <div class="container">
   
<div class="container py-4">
    <a href="index.php#team" class="btn btn-secondary mb-4">&larr; Kembali</a>
  <h2 class="mb-3">Daftar Lengkap Guru</h2>

<!-- Search -->
<div class="input-group mb-4">
  <input type="text" id="searchTeacher" class="form-control" placeholder="Cari nama atau jabatan...">
</div>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" id="teacher-list">
  <?php while($item = mysqli_fetch_assoc($result)) { ?>
    <div class="col">
      <div class="card h-100 text-center p-3 shadow-sm d-flex flex-column">
        <img src="../storages/teachers/<?= $item['teachers_photo'] ?>" class="card-img-top" alt="Foto Guru">
        <div class="card-body d-flex flex-column justify-content-end">
          <h5 class="card-title mb-1"><?= $item['teachers_name'] ?></h5>
          <small class="text-muted"><?= $item['teachers_major'] ?></small>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
</div>
<script>
document.getElementById('searchTeacher').addEventListener('keyup', function() {
    let query = this.value.trim();

    fetch('search-teachers.php?q=' + encodeURIComponent(query))
      .then(res => res.json())
      .then(data => {
        let html = '';
        if (data.length > 0) {
          data.forEach(item => {
            html += `
              <div class="col">
                <div class="card h-100 text-center p-3 shadow-sm d-flex flex-column">
                  <img src="../storages/teachers/${item.teachers_photo}" class="card-img-top" alt="Foto Guru">
                  <div class="card-body d-flex flex-column justify-content-end">
                    <h5 class="card-title mb-1">${item.teachers_name}</h5>
                    <small class="text-muted">${item.teachers_major}</small>
                  </div>
                </div>
              </div>
            `;
          });
        } else {
          html = '<p class="text-muted">Tidak ada guru ditemukan.</p>';
        }
        document.querySelector('.row.g-4').innerHTML = html;
      });
});
</script>


</body>
</html>
