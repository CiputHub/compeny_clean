<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';

include './show.php';


    if(isset($_POST['tombol'])){
    $imgNew= $contact->img;
    $contact = escapeString($_POST['contact']);
    $link_url= escapeString($_POST['link_url']);
    $email= escapeString($_POST['email']);
    $link_map= escapeString($_POST['link_map']);


    $storages = "../../../storages/contact/";
     //cek apakah user menguplod gambar baru
     if(!empty($_FILES['img']['tmp_name'])) {
        $imgOld = $_FILES['img']['tmp_name'];
        $imgNew= time() . ".png";

        //hapus gambar lama jika ada
        if(!empty($contact->img) && file_exists($storages . $contact->img)){
            unlink($storages . $contact->img);
     }

     //simpan gambar baru
     move_uploaded_file($imgOld, $storages . $imgNew);
    }
// update data sesuai id

    $qUpdate = "UPDATE contacts SET img='$imgNew', contact='$contact', link_url='$link_url', email='$email', link_map='$link_map'  WHERE id='$id'";
    

     //update ke databse
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database
        $userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Kontak ID $id:");

        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Didedit'); window.location.href = '../../pages/contact/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Didedit); window.location.href = '../../pages/contact/create.php';
            </script>
            ";

    }
} 
    ?>