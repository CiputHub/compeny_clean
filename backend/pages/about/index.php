<?php
session_start();

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

// Anti-back + cek login
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    echo "<script>
        alert('Silakan login terlebih dahulu!');
        window.location.href='../user/login.php';
    </script>";
    exit();
}

// Untuk mencegah back browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");



include '../../app.php'; 
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qabout = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qabout) or die(mysqli_error($connect));
?>

<body class="text-uppercase">
<main>
<div class="container-fluid px-4 mt-5">
    <div class="card mb-4">
        <div class="card-header d-flex align-item-center justify-content-between">
            <h5 class="mt-2">Tabel Tentang Kami</h5>
            <a href="./create.php" class="btn btn-primary">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered border-dark text-center align-middle table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Sekolah</th>
                        <th>Logo Sekolah</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while($item = $result->fetch_object()):
                    ?>
                    <tr>
                        <td><?= $no?></td>
                        <td class="text-uppercase"><?= $item->school_name?></td>
                        <td>
                            <img src="../../../storages/about/<?= $item->school_logo?>" alt="gambar" width="100" height="100">
                        </td>
                        <td class="text-uppercase"><?= mb_strimwidth($item->alamat, 0, 50, "...") ?></td>
                        <td>
                            <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-success">Detail</a>
                            <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                             <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                            <a href="../../action/about/delete.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                        <?php endif; ?>
                        </td>
                    </tr>
                    <?php
                    $no++;
                    endwhile;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?> 

<style>
.dataTables_filter {
    display: none;
}
</style>

