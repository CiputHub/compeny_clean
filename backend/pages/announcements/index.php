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


include '../../app.php'; // sesuaikan path ke koneksi DB
    
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

// Query ambil semua data prestasi
$qPengumuman = "SELECT * FROM announcements";
$result = mysqli_query($connect, $qPengumuman) or die(mysqli_error($connect));
?>
    
    
                  <div id="layoutSidenav_content">
                     <body class=""> 
                <main>
                    <div class="container-fluid px-4 mt-5">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-item-center justify-content-between">
                                <h5 class="mt-2">Tabel Pengumuman</h5>
                              
                            <a href="./create.php" class="btn btn-primary">Tambah</a>
                      
                            </div>
                            <div class="card-body">
                                     <!-- Form Search -->
                    <!-- <form method="GET" class="mb-3 d-flex">
                        <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" 
                               class="form-control me-2" placeholder="Cari judul / deskripsi...">
                        <button type="submit" class="btn btn-success">Search</button>
                        <a href="index.php" class="btn btn-secondary ms-2">Reset</a>
                    </form> -->

                               <table class="table table-bordered border-dark text-center align-middle table-striped">
                               <thead class="table-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
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
                                   <td><?= $no++?></td>

                                   <td class="text-uppercase" style="width: 2%;" ><?= $item->announcements_title?></td>
                                   
                                   <td>
                                       <img src="../../../storages/announcements/<?=$item->announcements_image?>"
                                       alt="gambar" width="100" height="100">
                                    </td>                            
                                    <td class="text-uppercase" ><?= mb_strimwidth($item->announcements_description, 0, 50, "...") ?></td>
                                    <td>
                                        <a href="./detail.php?id=<?= $item->id ?>" class="btn btn-success">Detail</a>
                                        <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                                         <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
                        
                            <a href="../../action/announcements/delete.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin?')">Hapus</a>
                        <?php endif; ?>
                                    </td>
                                </tr>
                           <?php
                          endwhile;
                            else:
                            ?>
                            <tr>
                                <td colspan="5">Data tidak ditemukan</td>
                            </tr>
                            <?php endif; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>

                        </body>           
<?php
    include '../../partials/footer.php';
    include '../../partials/script.php';
?>