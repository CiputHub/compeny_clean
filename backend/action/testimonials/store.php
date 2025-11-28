<?php

session_start();
if (!isset($_SESSION['user_logged_in'])) {
    header('Location: ../../pages/user/login.php');
    exit();
}


include '../../app.php';
include '../../helpers/activity_helper.php'; // <-- tambahin ini

if (isset($_POST['tombol'])) {
    $name    = escapeString($_POST['name']);
    $status  = escapeString($_POST['status']);
    $message = escapeString($_POST['message']);
    $rating  = intval($_POST['rating']); // ⭐ tambahin rating

    $imageOld = $_FILES['image']['tmp_name'];
    $imageNew = time() . ".png";

    $storages = "../../../storages/testimonials/";
    if (move_uploaded_file($imageOld, $storages . $imageNew)) {
        $qInsert = "INSERT INTO testimonials(image, name, status, message, rating) 
                    VALUES('$imageNew', '$name', '$status', '$message', '$rating')";

        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
            $userId = $_SESSION['user_id']; // pastikan ini ada di session login
    saveActivity($connect, $userId, 'create', "Menambahkan data Testimoni:");
        echo "
        <script>
            alert('Data Berhasil Ditambahkan');
            window.location.href = '../../pages/testimonials/index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Data gagal Ditambahkan');
            window.location.href = '../../pages/testimonials/create.php';
        </script>
        ";
    }
}
?>
