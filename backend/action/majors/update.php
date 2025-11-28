<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';
include './show.php';

   if(isset($_POST['tombol'])){
    $majors_name = escapeString($_POST['majors_name']);
    $majors_description = escapeString($_POST['majors_description']);
    $head = escapeString($_POST['head']);
    
    $storages = "../../../storages/majors/";
    $majors_imageNew = $majors->majors_image; 
     //cek apakah user menguplod gambar baru
     if(!empty($_FILES['majors_image']['tmp_name'])) {
        $majors_imageOld = $_FILES['majors_image']['tmp_name'];
        $majors_imageNew= time() . ".png";

        //hapus gambar lama jika ada
        if(!empty($majors->majors_image) && file_exists($storages . $majors->majors_image)){
            unlink($storages . $majors->majors_image);
     }

     //simpan gambar baru
     move_uploaded_file($majors_imageOld, $storages . $majors_imageNew);
    }
// update data sesuai id

    $qUpdate = "UPDATE majors SET majors_name='$majors_name', majors_image='$majors_imageNew', majors_description='$majors_description', head='$head'  WHERE id='$id'";
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

$userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Jurusan ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Diedit'); window.location.href = '../../pages/majors/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Diedit); window.location.href = '../../pages/majors/create.php';
            </script>
            ";

    }
} 
    ?>