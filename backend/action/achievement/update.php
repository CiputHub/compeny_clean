<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';


if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location.href='../../pages/achievement/index.php';
    </script>";
    exit;
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM achievements WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$achievement = mysqli_fetch_object($result);

if (!$achievement) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/achievement/index.php';
    </script>";
    exit;
}

if (isset($_POST['tombol'])) {
    $title  = escapeString($_POST['title']);
    $description = escapeString($_POST['description']);

    $storages = "../../../storages/achievement/";

    // default: file lama
    $image   = $achievement->image;
  
    // upload logo baru
    if (!empty($_FILES['image']['tmp_name'])) {
        if (!empty($achievement->image) && file_exists($storages . $achievement->image)) {
            unlink($storages . $achievement->image);
        } 
        $image = uniqid() . '_logo.png';
        move_uploaded_file($_FILES['image']['tmp_name'], $storages . $image);

    }

    // query update
    $qUpdate = "UPDATE achievements SET 
            image='$image',
            title='$title',
            description='$description'
            WHERE id='$id'
        ";
        $result = mysqli_query($connect, $qUpdate);

    if ($result) {
          $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Prestasi ID $id:");
        echo "<script>
                alert('Data berhasil diupdate');
                window.location.href='../../pages/achievement/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal update data');
                window.location.href='../../pages/achievement/edit.php?id=$id';
              </script>";
    }
}
