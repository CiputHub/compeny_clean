<?php
session_start();
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}

$activePage = 'user';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';

$qUser = "SELECT * FROM users";
$result = mysqli_query($connect, $qUser) or die(mysqli_error($connect));
?>

<div id="layoutSidenav_content">
<main>
    <div class="container-fluid px-4 mt-5">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mt-2">Tabel User</h5>
                <a href="./create.php" class="btn btn-primary">Tambah User</a>
            </div>
            <div class="card-body">
               <table class="table table-bordered table-striped text-center">
                  <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    while($item = $result->fetch_object()):
                    ?>
                    <tr>
                       <td><?= $no ?></td>
                       <td><?= htmlspecialchars($item->name) ?></td>
                       <td><?= htmlspecialchars($item->email) ?></td>
                       <td><?= htmlspecialchars($item->role) ?></td>
                       <td>
                           <a href="./edit.php?id=<?= $item->id ?>" class="btn btn-warning">Edit</a>
                           <a href="../../action/users/delete.php?id=<?= $item->id ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?')">Hapus</a>
                       </td>
                    </tr>
                    <?php $no++; endwhile; ?>
                  </tbody>
               </table>
            </div>
        </div>
    </div>
</main>
</div>

<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>
