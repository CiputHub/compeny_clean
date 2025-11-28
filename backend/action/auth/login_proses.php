<?php
session_start();
include '../../app.php'; // koneksi database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = escapeString($_POST['email']);
    $password = $_POST['password'];

    $qLogin = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($connect, $qLogin) or die(mysqli_error($connect));

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            // simpan session
            $_SESSION['user_logged_in'] = true;
            $_SESSION['user_id']        = $user['id'];
            $_SESSION['username']       = $user['name'];
            $_SESSION['user_role']      = $user['role'];

            // simpan riwayat login
            $qHistory = "INSERT INTO user_activity (user_id, activity) VALUES ({$user['id']}, 'login')";
            mysqli_query($connect, $qHistory);

            // redirect sesuai role baru
            if ($user['role'] === 'admin') {
                // ini dulunya superadmin → admin
                header('Location: ../../pages/dashboard/index.php');
                exit();
            } else if ($user['role'] === 'staff') {
                // ini dulunya admin → staff
                header('Location: ../../pages/dashboard/index.php');
                exit();
            }
        } else {
            echo "<script>alert('Email atau password salah'); window.location.href='../../pages/user/login.php';</script>";
        }
    } else {
        echo "<script>alert('Email tidak ditemukan'); window.location.href='../../pages/user/login.php';</script>";
    }
}
?>
