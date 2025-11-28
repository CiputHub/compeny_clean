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

if(isset($_POST['tombol'])){
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Cek apakah email sudah ada
    $check = mysqli_query($connect, "SELECT id FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "<script>
            alert('Email sudah terdaftar, gunakan email lain!');
            window.location.href='../../pages/users/create.php';
        </script>";
        exit();
    }

    // Insert jika email belum ada
    $qInsert = "INSERT INTO users (name, email, password, role) 
                VALUES ('$name', '$email', '$password', '$role')";
    if(mysqli_query($connect, $qInsert)){
        echo "<script>alert('User berhasil ditambahkan');window.location.href='../../pages/users/index.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan user');window.location.href='../../pages/users/create.php';</script>";
    }
}
?>
