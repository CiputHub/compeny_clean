<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';



if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location.href='../../pages/announcements/index.php';
    </script>";
    exit;
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM announcements WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$announcements = mysqli_fetch_object($result);

if (!$announcements) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/announcements/index.php';
    </script>";
    exit;
}

if (isset($_POST['tombol'])) {
    $announcements_title  = escapeString($_POST['announcements_title']);
    $announcements_description = escapeString($_POST['announcements_description']);

    $storages = "../../../storages/announcements/";

    // default: file lama
    $announcements_image   = $announcements->announcements_image;
  
    // upload logo baru
    if (!empty($_FILES['announcements_image']['tmp_name'])) {
    if (!empty($announcements->announcements_image) && file_exists($storages . $announcements->announcements_image)) {
        unlink($storages . $announcements->announcements_image);
    } 
    $announcements_image = uniqid() . '_logo.png'; // pakai ini
    move_uploaded_file($_FILES['announcements_image']['tmp_name'], $storages . $announcements_image);
}


    // query update
    $qUpdate = "UPDATE announcements SET 
            announcements_title='$announcements_title',
            announcements_image='$announcements_image',
            announcements_description='$announcements_description'
            WHERE id='$id'
        ";
        $result = mysqli_query($connect, $qUpdate);

    if ($result) {
         $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Pengumuman ID $id:");
        echo "<script>
                alert('Data berhasil diupdate');
                window.location.href='../../pages/announcements/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal update data');
                window.location.href='../../pages/announcements/edit.php?id=$id';
              </script>";
    }
}
