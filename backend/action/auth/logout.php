<?php
session_start();
include '../../app.php';

if (isset($_SESSION['user_id'])) {
    $id = (int) $_SESSION['user_id'];

    // cek apakah user masih ada di tabel users
    $checkUser = mysqli_query($connect, "SELECT id FROM users WHERE id = $id");

    if ($checkUser && mysqli_num_rows($checkUser) > 0) {
        // simpan riwayat logout hanya jika user valid
        $qHistory = "INSERT INTO user_activity (user_id, activity) VALUES ($id, 'logout')";
        mysqli_query($connect, $qHistory) or die(mysqli_error($connect));
    }
}

session_destroy();

echo "<script>
    alert('Berhasil logout!');
    window.location.href='../../pages/user/login.php';
</script>";
exit();
