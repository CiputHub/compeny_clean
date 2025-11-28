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

// Untuk mencegah back browser
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");


$activePage = 'message';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qmessages = "SELECT * FROM message";
$result = mysqli_query($connect, $qmessages) or die(mysqli_error($connect));

?>

<!-- content -->
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4 mt-5">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-item-center justify-content-between">
                                <h5 class="mt-2">Tabel Pesan</h5>
                                <!-- <a href="./create.php" class="btn btn-primary">Tambah</a> -->
                            </div>
                            <div class="card-body">
                               <table class="table table-bordered border-dark text-center align-middle table-striped">
                               <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Telepon</th>
                                <th>Pesan</th>

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
                    
                                    <td class="text-uppercase" ><?= $item->name?></td>
                                    <td><?= $item->email?></td>
                                    <td class="text-uppercase" ><?= $item->telepon?></td>
                                    <td class="text-uppercase" ><?= $item->message?></td>
                                <td>
                                    <!-- <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-success">Detail</a> -->
                                    <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>

                            <a href="../../action/message/delete.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
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