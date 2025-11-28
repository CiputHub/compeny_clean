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

include '../../app.php'; 
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Query ambil semua data prestasi
$qabout = "SELECT * FROM achievements";
$result = mysqli_query($connect, $qabout) or die(mysqli_error($connect));
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-5">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mt-2">Tabel Prestasi</h5>
                    <a href="./create.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="card-body">

                    <!-- DataTable -->
                    <div class="table-responsive">
                        <table id="prestasiTable" class="table table-bordered border-dark text-center align-middle table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($result) > 0):
                                    while($item = $result->fetch_object()):
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><img src="../../../storages/achievement/<?=$item->image?>" alt="gambar" width="100" height="100"></td>
                                    <td class="text-uppercase"><?= $item->title ?></td>
                                    <td>
                                        <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-success">Detail</a>
                                        <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                                            <a href="../../action/achievement/delete.php?id=<?= $item->id ?>" 
                                            class="btn btn-danger" 
                                            onclick="return confirm('apakah anda yakin?')">Hapus</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php
                                    $no++;
                                    endwhile;
                                else:
                                ?>
                                <tr>
                                    <td colspan="4">Data tidak ditemukan</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>

