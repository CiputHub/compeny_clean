<?php
include '../../app.php';

if(isset($_POST['tombol'])){
    $icon = escapeString($_POST['icon']);
    $job = escapeString($_POST['job']);
 

     $qInsert = "INSERT INTO services(icon, job) VALUES('$icon', '$job')";
     
    if (mysqli_query($connect, $qInsert)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href = '../../pages/service/index.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah'); window.location.href = '../../pages/service/create.php';</script>";
    }
}

    ?>