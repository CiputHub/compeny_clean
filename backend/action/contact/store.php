<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

    if(isset($_POST['tombol'])){   
    $contact = escapeString($_POST['contact']);
    $link_url = escapeString($_POST['link_url']);
    $email = escapeString($_POST['email']);
    $link_map = escapeString($_POST['link_map']);
    $imgOld = $_FILES['img']['tmp_name'];
    $imgNew= time() . ".png";
    

    $storages = "../../../storages/contact/";
    if(move_uploaded_file($imgOld, $storages . $imgNew)){

        $qInsert = "INSERT INTO contacts (img, contact, link_url, email, link_map) VALUES('$imgNew','$contact','$link_url', '$email', '$link_map')";
        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
          $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Kontak:");
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/contact/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data gagal Ditambahkan); window.location.href = '../../pages/contact/create.php';
            </script>
            ";

    }
}
    

    ?>