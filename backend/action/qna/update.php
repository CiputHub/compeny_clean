<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';
include './show.php';

    if(isset($_POST['tombol'])){   
    $tanya = escapeString($_POST['tanya']);
    $jawab = escapeString($_POST['jawab']);

    }
// update data sesuai id

    $qUpdate = "UPDATE qna SET tanya='$tanya', jawab='$jawab' WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

$userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Tanya Jawab ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil diedit'); window.location.href = '../../pages/qna/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal diedit); window.location.href = '../../pages/qna/create.php';
            </script>
            ";

    }

    ?>