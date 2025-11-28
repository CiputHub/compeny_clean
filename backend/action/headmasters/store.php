<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

    if(isset($_POST['tombol'])){
    $headmaster_name = escapeString($_POST['headmaster_name']);
    $headmaster_description= escapeString($_POST['headmaster_description']);
    $headmaster_photoOld = $_FILES['headmaster_photo']['tmp_name'];
    $headmaster_photoNew= time() . ".png";
    

    $storages = "../../../storages/headmasters/";
    if(move_uploaded_file($headmaster_photoOld, $storages . $headmaster_photoNew)){
        $qInsert = "INSERT INTO headmasters(headmaster_name, headmaster_photo,
        headmaster_description) VALUES('$headmaster_name', '$headmaster_photoNew', '$headmaster_description')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Kepala Sekolah:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/headmasters/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data gagal Ditambahkan); window.location.href = '../../pages/headmasters/create.php';
            </script>
            ";

    }
    }

    ?>