<?php
session_start(); // <-- ini WAJIB paling atas
include '../../app.php';
include '../../helpers/activity_helper.php';
include './show.php';


$storages = "../../storages/social_media/";
        if(!empty($social_media->image) && file_exists($storages . $social_media->image)){
            unlink($storages . $social_media->image);
     }
//hapus data
     $qDelete = "DELETE FROM social_media WHERE id = '$social_media->id'";
     //mengirim pesan jke querydelete tolong dong di hapus
     $result = mysqli_query($connect, $qDelete) or die (mysqli_error($connect));

     //cek apakah data berhasil di hapus atau tidak
     if ($result){//kirim ke database
   $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'delete', "Menghapus data Sosial Media ID $id");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil dihapus'); window.location.href = '../../pages/social_media/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal dihapus); window.location.href = '../../pages/social_media/create.php';
            </script>
            ";

    }


?>
