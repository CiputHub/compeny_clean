<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

    if(isset($_POST['tombol'])){
    $title = escapeString($_POST['title']);
    $content= escapeString($_POST['content']);
    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew= time() . ".png";
    

    $storages = "../../../storages/blogs/";
    if(move_uploaded_file($imageOld, $storages . $imageNew)){
        $qInsert = "INSERT INTO blogs(image, title, 
        content) VALUES('$imageNew', '$title', '$content')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
         $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Berita:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/blog/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data gagal Ditambahkan); window.location.href = '../../pages/blog/create.php';
            </script>
            ";

    }
    }

    ?>