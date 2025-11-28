<?php

session_start();

// Anti-back + cek login
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    echo "<script>
        alert('Silakan login terlebih dahulu!');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

// Tambahkan header untuk mencegah back browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");



include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';





// ambil data pesan per bulan
$qPesanPerBulan = "
    SELECT MONTH(created_at) AS bulan, COUNT(*) AS total
    FROM message
    WHERE YEAR(created_at) = YEAR(CURDATE())
    GROUP BY MONTH(created_at)
";
$resPesan = mysqli_query($connect, $qPesanPerBulan);

$dataPesan = [];
while ($row = mysqli_fetch_assoc($resPesan)) {
    $dataPesan[$row['bulan']] = $row['total'];
}

// bikin array bulan 1-12
$bulanNama = [
    1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
    5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
    9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
];

$labels = [];
$totals = [];

for ($i = 1; $i <= 12; $i++) {
    $labels[] = $bulanNama[$i];
    $totals[] = isset($dataPesan[$i]) ? $dataPesan[$i] : 0;
}

$qGender = "
    SELECT gender, COUNT(*) as total 
    FROM teachers 
    GROUP BY gender
";
$resGender = mysqli_query($connect, $qGender);

$genderLabels = [];
$genderTotals = [];
while ($row = mysqli_fetch_assoc($resGender)) {
    $genderLabels[] = $row['gender'];
    $genderTotals[] = $row['total'];
}

$qContact = "SELECT * FROM message ORDER BY id DESC LIMIT 3";
$result_contact = mysqli_query($connect, $qContact) or die(mysqli_error($connect));

$roleText = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : 'Guest';

?> <!--  Row 1 -->
   
<div class="container-fluid mt-3">
  <div class="row">
    <!-- Welcome Card -->
   <div class="col-md-12 mb-4">
  <div class="card shadow-sm border-0 rounded-3">
    <div class="card-body text-center">
      <h3 class="card-title mb-3">Selamat Datang 👋</h3>
      <p class="card-text text-muted">
        Anda login sebagai: <strong class="text-primary"><?= htmlspecialchars($roleText) ?></strong>
      </p>
      <p class="card-text text-muted">
        Ini adalah halaman dashboard sederhana kami.  
        Silakan pilih menu di samping untuk mulai mengelola data.
      </p>
    </div>
  </div>
</div>
  </div>

  <!-- Statistik singkat -->
  <div class="row">
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm border-0 rounded-3 text-center p-3">
          
                              <h6 class="text-dark">Total Guru</h6>
                              <?php
                              $qCountteacher = "SELECT COUNT(*) as total FROM teachers";
                              $resCountteacher = mysqli_query($connect, $qCountteacher);
                              $totalteacher = mysqli_fetch_object($resCountteacher)->total;
                              ?>
                              <h3 class="mb-0 text-primary"><?= $totalteacher ?></h3>
        </div>
    </div>
    <div class="col-md-4 mb-3">
      <div class="card shadow-sm border-0 rounded-3 text-center p-3">
          
                              <h6 class="text-dark">Total Prestasi</h6>
                              <?php
                              $qCountachievement = "SELECT COUNT(*) as total FROM achievements";
                              $resCountachievement = mysqli_query($connect, $qCountachievement);
                              $totalachievement = mysqli_fetch_object($resCountachievement)->total;
                              ?>
                              <h3 class="mb-0 text-success"><?= $totalachievement ?></h3>
        </div>
    </div>
    <div class="col-md-4 mb-3">
       <div class="card shadow-sm border-0 rounded-3 text-center p-3">
          
                              <h6 class="text-dark">Total Jurusan</h6>
                              <?php
                              $qCountmajor = "SELECT COUNT(*) as total FROM majors";
                              $resCountmajor = mysqli_query($connect, $qCountmajor);
                              $totalmajor = mysqli_fetch_object($resCountmajor)->total;
                              ?>
                              <h3 class="mb-0 text-danger"><?= $totalmajor ?></h3>
        </div>
    </div>
  </div>

  <!-- Grafik dan Tabel -->
  <div class="row">
    <div class="col-md-8 mb-4">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white fw-bold">Total Pesan Perbulan</div>
        <div class="card-body">
          <canvas id="pesanChart" height="120"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-white fw-bold">Statistik Guru</div>
        <div class="card-body">
          <canvas id="pieChart" height="180"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
new Chart(document.getElementById('pesanChart'), {
  type: 'bar',
  data: {
    labels: <?= json_encode($labels) ?>,   // Jan–Des
    datasets: [{
      label: 'Jumlah Pesan',
      data: <?= json_encode($totals) ?>,   // isi data
      backgroundColor: 'rgba(54, 162, 235, 0.7)'
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
        ticks: {
          precision: 0 // supaya ga ada angka koma
        }
      }
    }
  }
});


  // Pie Chart guru vs siswa
new Chart(document.getElementById('pieChart'), {
  type: 'pie',
  data: {
    labels: <?= json_encode($genderLabels) ?>,
    datasets: [{
      data: <?= json_encode($genderTotals) ?>,
      backgroundColor: ["#0d6efd", "#db1f87ff"] // biru & merah
    }]
  }
});

</script>

<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">KONTAK TERBARU</h5>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>EMAIL</th>
            <th>TELEPON</th>
            <th>PESAN</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          while ($row = mysqli_fetch_assoc($result_contact)) { ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= htmlspecialchars($row['name']); ?></td>
              <td><?= htmlspecialchars($row['email']); ?></td>
              <td><?= htmlspecialchars($row['telepon']); ?></td>
              <td><?= htmlspecialchars($row['message']); ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <a href="../message/index.php" class="btn btn-primary btn-sm float-end">LIHAT SEMUA</a>
  </div>
</div>
<div class="card mt-3">
  <div class="card-body">
    <h5 class="card-title">Riwayat Aktivitas User</h5>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>ROLE</th>
            <th>AKTIVITAS</th>
            <th>DESKRIPSI</th>
            <th>WAKTU</th>
          </tr>
        </thead>
        <tbody>
          <?php 
         $qHistory = "SELECT ua.*, u.name, u.role 
             FROM user_activity ua
             JOIN users u ON ua.user_id = u.id
             ORDER BY ua.activity_time DESC LIMIT 5";
        $result = mysqli_query($connect, $qHistory);
          $no = 1;
        while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['role'] ?></td>
        <td><?= ucfirst($row['activity']) ?></td>
        <td><?= $row['description'] ?></td>
        <td><?= $row['activity_time'] ?></td>
      </tr>
    <?php } ?>
        </tbody>
      </table>
    </div>
      <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
        <a href="../user_activity/index.php" class="btn btn-primary btn-sm float-end mt-2">Lihat Semua Aktivitas</a>          
      <?php endif; ?>
    <!-- Tambah tombol ini -->
  </div>
</div>


    
<?php
include '../../partials/footer.php';
include '../../partials/script.php';


?>