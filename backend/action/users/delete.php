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

$id = $_GET['id'];

$qDelete = "DELETE FROM users WHERE id='$id'";
if(mysqli_query($connect, $qDelete)){
    echo "<script>alert('User berhasil dihapus'); window.location.href='../../pages/users/index.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus user'); window.location.href='../../pages/users/index.php';</script>";
}
?>
