<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

    if(isset($_POST['tombol'])){
    $teachers_name = escapeString($_POST['teachers_name']);
    $teachers_major= escapeString($_POST['teachers_major']);
    $gender= escapeString($_POST['gender']);
    
    $teachers_photoOld = $_FILES['teachers_photo']['tmp_name'];
    $teachers_photoNew= time() . ".png";
    

    $storages = "../../../storages/teachers/";
    if(move_uploaded_file($teachers_photoOld, $storages . $teachers_photoNew)){
        $qInsert = "INSERT INTO teachers(teachers_name, teachers_photo,
        teachers_major, gender) VALUES('$teachers_name', '$teachers_photoNew', '$teachers_major', '$gender')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Guru:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/teachers/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data gagal Ditambahkan); window.location.href = '../../pages/teachers/create.php';
            </script>
            ";

    }
    }

    ?>