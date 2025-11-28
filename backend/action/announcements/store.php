<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini


    if(isset($_POST['tombol'])){
    $announcements_title = escapeString($_POST['announcements_title']);
    $announcements_description= escapeString($_POST['announcements_description']);
    $announcements_imageOld = $_FILES['announcements_image']['tmp_name'];
    $announcements_imageNew= time() . ".png";
    

    $storages = "../../../storages/announcements/";
    if(move_uploaded_file($announcements_imageOld, $storages . $announcements_imageNew)){
        $qInsert = "INSERT INTO announcements(announcements_title, announcements_image, 
        announcements_description) VALUES('$announcements_title', '$announcements_imageNew',  '$announcements_description')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Pengumuman:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/announcements/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data gagal Ditambahkan); window.location.href = '../../pages/announcements/create.php';
            </script>
            ";

    }
    }

    ?>