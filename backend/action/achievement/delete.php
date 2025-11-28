<?php
session_start(); // <-- ini WAJIB paling atas
include '../../app.php';
include '../../helpers/activity_helper.php';

if (isset($_GET['id'])) {
    $id = escapeString($_GET['id']);

  $qSelect = "SELECT * FROM achievements WHERE id='$id'";
    $result  = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
    $achievement   = mysqli_fetch_object($result);

    if (!$achievement) {
        echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href='../../pages/achievement/index.php';
        </script>";
        exit;
    }

    // Lokasi file
    $storages = "../../storages/achievement/";

//hapus data
    if (!empty($achievement->image) && file_exists($storages . $achievement->image)) {
        unlink($storages . $achievement->image);
    }

    // Hapus data
    $qDelete = "DELETE FROM achievements WHERE id='$id'";
    $delete  = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

    if ($delete) {
          $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'delete', "Menghapus data Prestasi ID $id");
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href='../../pages/achievement/index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location.href='../../pages/achievement/index.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location.href='../../pages/achievement/index.php';
    </script>";
}
?>



?>
