<?php
session_start(); // <-- ini WAJIB paling atas
include '../../app.php';
include '../../helpers/activity_helper.php';
include './show.php';


$storages = "../../storages/majors/";
//hapus gambar lama jika ada
//end harus benar 22 nya salah 1 error
//kalo or salah satu saja
        if(!empty($majors->majors_image) && file_exists($storages . $majors->majors_image)){
            unlink($storages . $majors->majors_image);
     }
//hapus data
     $qDelete = "DELETE FROM majors WHERE id = '$majors->id'";
     $result = mysqli_query($connect, $qDelete) or die (mysqli_error($connect));

     //cek apakah data berhasil di hapus atau tidak
     if ($result){//kirim ke database
          $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'delete', "Menghapus data Jurusan ID $id");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil dihapus'); window.location.href = '../../pages/majors/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal dihapus); window.location.href = '../../pages/majors/create.php';
            </script>
            ";

    }


?>
