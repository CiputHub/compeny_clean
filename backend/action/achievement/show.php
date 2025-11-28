<?php
include '../../app.php'; // sesuaikan path ke koneksi DB

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan.");
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM achievements WHERE id = $id";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));

$achievement = mysqli_fetch_object($result);

if (!$achievement) {
    die("Data tidak ditemukan.");
}
?>
