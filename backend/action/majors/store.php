<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

    if(isset($_POST['tombol'])){   
    $majors_name = escapeString($_POST['majors_name']);
    $majors_description = escapeString($_POST['majors_description']);
    $head = escapeString($_POST['head']);
    $majors_imageOld = $_FILES['majors_image']['tmp_name'];
    $majors_imageNew= time() . ".png";


    $storages = "../../../storages/majors/";
    if(move_uploaded_file($majors_imageOld, $storages . $majors_imageNew)){
        $qInsert = "INSERT INTO majors(majors_name, majors_image, majors_description, head) VALUES( '$majors_name', '$majors_imageNew', '$majors_description', '$head')";
        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
           $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Jurusan:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/majors/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data Gagal Ditambahkan); window.location.href = '../../pages/majors/create.php';
            </script>
            ";

    }
    }

    ?>