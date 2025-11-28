<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}

include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

if(isset($_POST['tombol'])){   
    $tanya = escapeString($_POST['tanya']);
    $jawab = escapeString($_POST['jawab']);

        $qInsert = "INSERT INTO qna (tanya, jawab) VALUES( '$tanya', '$jawab')";
        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Tanya Jawab:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/qna/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data gagal Ditambahkan); window.location.href = '../../pages/qna/create.php';
            </script>
            ";

    }
    

    ?>