<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include_once '../../app.php';
include './show.php';

if (isset($_POST['tombol'])) {
    $icon = escapeString($_POST['icon']);
    $title = escapeString($_POST['title']);
    $link_url = escapeString($_POST['link_url']);
    $id = $social_media->id;

    $qUpdate = "UPDATE social_media SET icon='$icon', title='$title', link_url='$link_url' WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result) {
        $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Social Media ID $id:");
        echo "<script>alert('Data berhasil diubah'); window.location.href = '../../pages/social_media/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href = '../../pages/social_media/edit.php?id=$id';</script>";
    }
}
?>