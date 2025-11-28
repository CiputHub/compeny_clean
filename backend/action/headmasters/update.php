<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';
include './show.php';


    if(isset($_POST['tombol'])){
    $headmaster_photoNew= $headmasters->headmaster_photo;
    $headmaster_name = escapeString($_POST['headmaster_name']);
    $headmaster_description= escapeString($_POST['headmaster_description']);


    $storages = "../../../storages/headmasters/";
     //cek apakah user menguplod gambar baru
     if(!empty($_FILES['headmaster_photo']['tmp_name'])) {
        $headmaster_photoOld = $_FILES['headmaster_photo']['tmp_name'];
        $headmaster_photoNew= time() . ".png";

        //hapus gambar lama jika ada
        if(!empty($headmasters->headmaster_photo) && file_exists($storages . $headmasters->headmaster_photo)){
            unlink($storages . $headmasters->headmaster_photo);
     }

     //simpan gambar baru
     move_uploaded_file($headmaster_photoOld, $storages . $headmaster_photoNew);
    }
// update data sesuai id

    $qUpdate = "UPDATE headmasters SET 
    headmaster_photo='$headmaster_photoNew', 
    headmaster_name='$headmaster_name', 
    headmaster_description='$headmaster_description' 
     WHERE id='$id'";
    

     //update ke databse
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

        $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Kepala Sekolah ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Didedit'); window.location.href = '../../pages/headmasters/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Didedit); window.location.href = '../../pages/headmasters/create.php';
            </script>
            ";

    }
} 
    ?>