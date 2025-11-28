<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';

include './show.php';


    if(isset($_POST['tombol'])){
    $imageNew= $galleries->image;
    $title = escapeString($_POST['title']);
    


    $storages = "../../../storages/galleries/";
     //cek apakah user menguplod gambar baru
     if(!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew= time() . ".png";

        //hapus gambar lama jika ada
        if(!empty($galleries->image) && file_exists($storages . $galleries->image)){
            unlink($storages . $galleries->image);
     }

     //simpan gambar baru
     move_uploaded_file($imageOld, $storages . $imageNew);
    }
// update data sesuai id

    $qUpdate = "UPDATE galleries SET image='$imageNew', title='$title' WHERE id='$id'";
    

     //update ke databse
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

        $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Galeri ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Didedit'); window.location.href = '../../pages/galleries/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Didedit); window.location.href = '../../pages/galleries/create.php';
            </script>
            ";

    }
} 
    ?>