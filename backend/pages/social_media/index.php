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


$activePage = 'socmeds';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qsocmeds = "SELECT * FROM social_media";
$result = mysqli_query($connect, $qsocmeds) or die(mysqli_error($connect));

?>

<!-- content -->
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-5">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-item-center justify-content-between">
                                <h5 class="mt-2">Tabel Social media</h5>
                                
                            <a href="./create.php" class="btn btn-primary">Tambah</a>

                            </div>
                            <div class="card-body">
                               <table class="table table-bordered border-dark text-center align-middle table-striped">
                               <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Ikon</th>
                                <th>Judul</th>
                                <th>Tautan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($item = $result->fetch_object()):

                            ?>
                                <tr>
                                    <td class="text-uppercase" ><?= $no ?></td>
                                    <td class="text-uppercase" ><i class="<?= $item->icon ?>" style="font-size: 2rem;"></i></td>
                                    <td ><?= $item->title ?></td>
                                    <td ><?= $item->link_url ?></td>
                                    <td>
                                        <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                         <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                            
                            <a href="../../action/social_media/delete.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
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
  

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>