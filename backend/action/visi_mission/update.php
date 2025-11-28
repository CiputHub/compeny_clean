<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';
include './show.php';

   if(isset($_POST['tombol'])){
    $category = escapeString($_POST['category']);
    $text = escapeString($_POST['text']);
    

    $qUpdate = "UPDATE visi_missions SET category='$category', text='$text'  WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

$userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Visi Misi ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Diedit'); window.location.href = '../../pages/visi_mission/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Diedit); window.location.href = '../../pages/visi_mission/create.php';
            </script>
            ";

    }
} 
    ?>