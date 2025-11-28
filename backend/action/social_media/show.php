<?php
include_once '../../app.php';
if(!isset($_GET['id'])){
    echo "<script>alert('Tidak Bisa memilih ID ini'); window.location.href = '../../pages/social_media/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$qSelect = "SELECT * FROM social_media WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$social_media = $result->fetch_object();
if(!$social_media){
    echo "<script>alert('Data tidak ditemukan'); window.location.href = '../../pages/soocial_media/index.php';</script>";
    exit;
}
?>