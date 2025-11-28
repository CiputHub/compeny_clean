<?php
session_start(); // <-- ini WAJIB paling atas
include '../../app.php';
include '../../helpers/activity_helper.php';

if (isset($_GET['id'])) {
    $id = escapeString($_GET['id']);

    // Ambil data lama
    $qSelect = "SELECT * FROM abouts WHERE id='$id'";
    $result  = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
    $about   = mysqli_fetch_object($result);

    if (!$about) {
        echo "
        <script>
            alert('Data tidak ditemukan');
            window.location.href='../../pages/about/index.php';
        </script>";
        exit;
    }

    // Lokasi file
    $storages = "../../storages/about/";

    // Hapus logo
    if (!empty($about->school_logo) && file_exists($storages . $about->school_logo)) {
        unlink($storages . $about->school_logo);
    }

    // Hapus banner
    if (!empty($about->school_banner) && file_exists($storages . $about->school_banner)) {
        unlink($storages . $about->school_banner);
    }

    // Hapus data
    $qDelete = "DELETE FROM abouts WHERE id='$id'";
    $delete  = mysqli_query($connect, $qDelete) or die(mysqli_error($connect));

    
    if ($delete) {
        $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'delete', "Menghapus data About ID $id");
        echo "
        <script>
            alert('Data berhasil dihapus');
            window.location.href='../../pages/about/index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus');
            window.location.href='../../pages/about/index.php';
        </script>";
    }
} else {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location.href='../../pages/about/index.php';
    </script>";
}
?>
