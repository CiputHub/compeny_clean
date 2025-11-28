<?php
session_start();
include '../../app.php';

if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_role'] != 'admin') {
    echo "<script>
    alert('Anda tidak memiliki akses!');
    window.location.href='../../pages/dashboard/index.php';
    </script>";
    exit();
}

// Ambil data user sesuai ID
$id = $_GET['id'];
$qUser = "SELECT * FROM users WHERE id='$id'";
$result = mysqli_query($connect, $qUser);
$user = mysqli_fetch_object($result);


$current_dir = 'users';
include '../../partials/header.php';
include '../../partials/sidebar.php';
include '../../partials/navbar.php';
?>

<div id="layoutSidenav_content">
 <div class="row px-5 mt-5 justify-content-center">
    <div class="col-9">
        <div class="card">
            <div class="card-header">
                <h5>Edit User</h5>
            </div>
            <div class="card-body">
                <form action="../../action/users/update.php?id=<?= $user->id ?>" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($user->name) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($user->email) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru <small>(kosongkan jika tidak ingin diubah)</small></label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password baru">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" required>
                            <option value="admin" <?= $user->role == 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="staff" <?= $user->role == 'staff' ? 'selected' : '' ?>>Staff</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary me-3" name="tombol">Update</button>
                    <a href="./index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
 </div>
<?php
include '../../partials/footer.php';
include '../../partials/script.php';
?>
