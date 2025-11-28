<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}

include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

if(isset($_POST['tombol'])){
    $school_name        = escapeString($_POST['school_name']);
    $school_tagline     = escapeString($_POST['school_tagline']);
    $school_description = escapeString($_POST['school_description']);
    $since              = escapeString($_POST['since']);
    $alamat             = escapeString($_POST['alamat']);

    // Ambil file
    $school_logo_name   = $_FILES['school_logo']['name'];
    $school_logo_tmp    = $_FILES['school_logo']['tmp_name'];

    $school_banner_name = $_FILES['school_banner']['name'];
    $school_banner_tmp  = $_FILES['school_banner']['tmp_name'];

    $school_video_name  = $_FILES['school_video']['name'];
    $school_video_tmp   = $_FILES['school_video']['tmp_name'];

    // Folder tujuan (sama untuk image & video)
    $storages = "../../../storages/about/";

    // Pindahkan file
    $upload_logo   = move_uploaded_file($school_logo_tmp, $storages . $school_logo_name);
    $upload_banner = move_uploaded_file($school_banner_tmp, $storages . $school_banner_name);
    $upload_video  = move_uploaded_file($school_video_tmp, $storages . $school_video_name);

    if($upload_logo && $upload_banner && $upload_video){
        // Query insert data
        $qInsert = "INSERT INTO abouts 
            (school_name, school_logo, school_banner, school_video, school_tagline, school_description, since, alamat) 
            VALUES
            ('$school_name', '$school_logo_name', '$school_banner_name', '$school_video_name', '$school_tagline', '$school_description', '$since', '$alamat')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
         // === simpan aktivitas ===
    $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data About:");
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            window.location.href = '../../pages/about/index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data Gagal Ditambahkan');
            window.location.href = '../../pages/about/create.php';
        </script>";
    }
}
?>
