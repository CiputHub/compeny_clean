<?php
session_start(); // <-- ini WAJIB paling atas
include '../../app.php';
include '../../helpers/activity_helper.php';
// Ambil ID dari GET
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
    echo "
    <script>
        alert('ID tidak valid');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
    exit();
}

// Cek apakah data dengan ID itu ada
$qSelect = "SELECT * FROM contacts WHERE id = $id";
$result = mysqli_query($connect, $qSelect);

if (!$result) {
    die("Query error: " . mysqli_error($connect));
}

$contact = mysqli_fetch_object($result);

if (!$contact) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
    exit();
}

// Jika ada, lanjut hapus
$qDelete = "DELETE FROM contacts WHERE id = $id";
$resultDelete = mysqli_query($connect, $qDelete);

if ($resultDelete) {
          $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'delete', "Menghapus data Kontak ID $id");
    echo "
    <script>
        alert('Data berhasil dihapus');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal dihapus');
        window.location.href='../../pages/contact/index.php';
    </script>
    ";
}
?>
