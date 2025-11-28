<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';
include './show.php';


    if(isset($_POST['tombol'])){
    $imageNew= $testimonials->image;
    $name = escapeString($_POST['name']);
    $status= escapeString($_POST['status']);
    $message= escapeString($_POST['message']);
    $rating= escapeString($_POST['rating']);


    $storages = "../../../storages/testimonials/";
     //cek apakah user menguplod gambar baru
     if(!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew= time() . ".png";

        //hapus gambar lama jika ada
        if(!empty($testimonials->image) && file_exists($storages . $testimonials->image)){
            unlink($storages . $testimonials->image);
     }

     //simpan gambar baru
     move_uploaded_file($imageOld, $storages . $imageNew);
    }
// update data sesuai id

    $qUpdate = "UPDATE testimonials SET image='$imageNew', name='$name', status='$status',  message='$message', rating='$rating' WHERE id='$id'";
    

     //update ke databse
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

$userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Testimoni ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Didedit'); window.location.href = '../../pages/testimonials/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Didedit); window.location.href = '../../pages/testimonials/create.php';
            </script>
            ";

    }
} 
    ?>