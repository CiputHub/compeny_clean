<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';


include './show.php';


    if(isset($_POST['tombol'])){
    $imageNew= $blogs->image;
    $title = escapeString($_POST['title']);
    $content= escapeString($_POST['content']);


    $storages = "../../../storages/blogs/";
     //cek apakah user menguplod gambar baru
     if(!empty($_FILES['image']['tmp_name'])) {
        $imageOld = $_FILES['image']['tmp_name'];
        $imageNew= time() . ".png";

        //hapus gambar lama jika ada
        if(!empty($blogs->image) && file_exists($storages . $blogs->image)){
            unlink($storages . $blogs->image);
     }

     //simpan gambar baru
     move_uploaded_file($imageOld, $storages . $imageNew);
    }
// update data sesuai id

    $qUpdate = "UPDATE blogs SET image='$imageNew', title='$title', content='$content'  WHERE id='$id'";
    

     //update ke databse
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

     $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Berita ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Didedit'); window.location.href = '../../pages/blog/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Didedit); window.location.href = '../../pages/blog/create.php';
            </script>
            ";

    }
} 
    ?>