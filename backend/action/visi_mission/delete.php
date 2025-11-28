<?php
session_start(); // <-- ini WAJIB paling atas
include '../../app.php';
include '../../helpers/activity_helper.php';
include './show.php';

     $qDelete = "DELETE FROM visi_missions WHERE id = '$visi_mission->id'";
     $result = mysqli_query($connect, $qDelete) or die (mysqli_error($connect));

     if ($result){//kirim ke database
   $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'delete', "Menghapus data Visi Misi ID $id");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil dihapus'); window.location.href = '../../pages/visi_mission/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal dihapus); window.location.href = '../../pages/visi_mission/create.php';
            </script>
            ";

    }


?>
