<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../helpers/activity_helper.php'; // <-- tambahin ini
include_once '../../app.php';

if (isset($_POST['tombol'])) {
    $icon = escapeString($_POST['icon']);
    $title = escapeString($_POST['title']);
    $link_url = escapeString($_POST['link_url']);

    $qInsert = "INSERT INTO social_media(icon, title, link_url) VALUES('$icon', '$title', '$link_url')";
    if (mysqli_query($connect, $qInsert)) {
            $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Social Media:");
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = '../../pages/social_media/index.php';</script> ";
    } else {
        echo "<script>alert('Data gagal ditambah'); window.location.href = '../../pages/social_media/create.php';</script>";
    }
}