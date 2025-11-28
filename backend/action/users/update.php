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

if(isset($_POST['tombol'])){
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $role = $_POST['role'];

    // Jika password diisi, hash baru, kalau kosong tetap password lama
    $password_sql = "";
    if(!empty($_POST['password'])){
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password_sql = ", password='$password'";
    }

    $qUpdate = "UPDATE users SET name='$name', email='$email', role='$role' $password_sql, updated_at=NOW() WHERE id='$id'";

    if(mysqli_query($connect, $qUpdate)){
        echo "<script>alert('User berhasil diupdate'); window.location.href='../../pages/users/index.php';</script>";
    } else {
        echo "<script>alert('Gagal update user'); window.location.href='../../pages/users/edit.php?id=$id';</script>";
    }
}
?>
