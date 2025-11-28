<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';

if (!isset($_GET['id'])) {
    echo "
    <script>
        alert('ID tidak ditemukan');
        window.location.href='../../pages/about/index.php';
    </script>";
    exit;
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM abouts WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die(mysqli_error($connect));
$about = mysqli_fetch_object($result);

if (!$about) {
    echo "
    <script>
        alert('Data tidak ditemukan');
        window.location.href='../../pages/about/index.php';
    </script>";
    exit;
}

if (isset($_POST['tombol'])) {
    $school_name        = escapeString($_POST['school_name']);
    $school_tagline     = escapeString($_POST['school_tagline']);
    $school_description = escapeString($_POST['school_description']);
    $since              = escapeString($_POST['since']);
    $alamat             = escapeString($_POST['alamat']);

    $storages = "../../../storages/about/";

// default: file lama
$school_logo   = $about->school_logo;
$school_banner = $about->school_banner;
$school_video  = $about->school_video;

// upload logo baru
if (!empty($_FILES['school_logo']['tmp_name'])) {
    if (!empty($about->school_logo) && file_exists($storages . $about->school_logo)) {
        unlink($storages . $about->school_logo);
    } 
    $school_logo = uniqid() . '_logo.png';
    move_uploaded_file($_FILES['school_logo']['tmp_name'], $storages . $school_logo);
}

// upload banner baru
if (!empty($_FILES['school_banner']['tmp_name'])) {
    if (!empty($about->school_banner) && file_exists($storages . $about->school_banner)) {
        unlink($storages . $about->school_banner);
    } 
    $school_banner = uniqid() . '_banner.png';
    move_uploaded_file($_FILES['school_banner']['tmp_name'], $storages . $school_banner);
}

// upload video baru
if (!empty($_FILES['school_video']['tmp_name'])) {
    if (!empty($about->school_video) && file_exists($storages . $about->school_video)) {
        unlink($storages . $about->school_video);
    } 
    $ext = pathinfo($_FILES['school_video']['name'], PATHINFO_EXTENSION);
    $school_video = uniqid() . '_video.' . $ext;
    move_uploaded_file($_FILES['school_video']['tmp_name'], $storages . $school_video);
}

    // query update
   $qUpdate = "UPDATE abouts SET 
        school_name='$school_name',
        school_logo='$school_logo',
        school_banner='$school_banner',
        school_video='$school_video',
        school_tagline='$school_tagline',
        school_description='$school_description',
        since='$since',
        alamat='$alamat'
      WHERE id='$id'";

    $result = mysqli_query($connect, $qUpdate);

    
    if ($result) {
        $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data About ID $id: $school_name");
        echo "<script>
                alert('Data berhasil diupdate');
                window.location.href='../../pages/about/index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal update data');
                window.location.href='../../pages/about/edit.php?id=$id';
              </script>";
    }
}
?>
