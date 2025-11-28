<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

    if(isset($_POST['tombol'])){   
   
    $category = escapeString($_POST['category']);
    $text = escapeString($_POST['text']);

        $qInsert = "INSERT INTO visi_missions(category, text) VALUES('$category', '$text')";
        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Visi Misi:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/visi_mission/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data Gagal Ditambahkan); window.location.href = '../../pages/visi_mission/create.php';
            </script>
            ";

    }
    

    ?>