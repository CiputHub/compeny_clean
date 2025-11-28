<?php
session_start();

include '../../helpers/activity_helper.php'; // <-- tambahin ini
include '../../app.php';
include './show.php';


    if(isset($_POST['tombol'])){
    $teachers_photoNew= $teachers->teachers_photo;
    $teachers_name = escapeString($_POST['teachers_name']);
    $teachers_major= escapeString($_POST['teachers_major']);
    $gender= escapeString($_POST['gender']);


    $storages = "../../../storages/teachers/";
     //cek apakah user menguplod gambar baru
     if(!empty($_FILES['teachers_photo']['tmp_name'])) {
        $teachers_photoOld = $_FILES['teachers_photo']['tmp_name'];
        $teachers_photoNew= time() . ".png";

        //hapus gambar lama jika ada
        if(!empty($teachers->teachers_photo) && file_exists($storages . $teachers->teachers_photo)){
            unlink($storages . $teachers->teachers_photo);
     }

     //simpan gambar baru
     move_uploaded_file($teachers_photoOld, $storages . $teachers_photoNew);
    }
// update data sesuai id

    $qUpdate = "UPDATE teachers SET teachers_photo='$teachers_photoNew', teachers_name='$teachers_name', teachers_major='$teachers_major', gender='$gender'  WHERE id='$id'";
    

     //update ke databse
    $result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
    if ($result){//kirim ke database

$userId = $_SESSION['user_id'];
        saveActivity($connect, $userId, 'update', "Mengedit data Guru ID $id:");
        //kalau berhasil kembali ke halamn index
        echo "
        <script>alert('Data Berhasil Didedit'); window.location.href = '../../pages/teachers/index.php';
        </script>
        ";
        //kalau gagal kembali ke halaman create
        }else{
            echo"
            <script>alert(Data Gagal Didedit); window.location.href = '../../pages/teachers/create.php';
            </script>
            ";

    }
} 
    ?>