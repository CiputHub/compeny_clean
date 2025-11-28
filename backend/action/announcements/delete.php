<?php
session_start(); // <-- ini WAJIB paling atas
include '../../app.php';
include '../../helpers/activity_helper.php';


if (isset($_GET['id'])) {
    $id = escapeString($_GET['id']);

  $qSelect = "SELECT * FROM announcements WHERE id='$id'";
    $result  = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
    $announcements   = mysqli_fetch_object($result);

    if (!$announcements) {
        echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href='../../pages/announcements/index.php';
        </script>";
        exit;
    }

    // Lokasi file
    $storages = "../../storages/announcements/";

//hapus data
    if (!empty($announcements->announcements_image) && file_exists($storages . $announcements->announcements_image)) {
        unlink($storages . $announcements->announcements_image);
    }

    // Hapus data
    $qDelete = "DELETE FROM announcements WHERE id='$id'";
    $delete  = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

    if ($delete) {
            $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'delete', "Menghapus data Pengumuman ID $id");
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href='../../pages/announcements/index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location.href='../../pages/announcements/index.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location.href='../../pages/announcements/index.php';
    </script>";
}
?>



?>
