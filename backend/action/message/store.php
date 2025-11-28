<?php
include '../../app.php';


    if(isset($_POST['tombol'])){   
    $name = escapeString($_POST['name']);
    $email = escapeString($_POST['email']);
    $message = escapeString($_POST['message']);

        $qInsert = "INSERT INTO message (name, email, message) VALUES( '$name', '$email', '$message')";
        mysqli_query($connect, $qInsert) or die(mysqli_error($connect));
        echo "
        <script>alert('Data Berhasil Ditambahkan'); window.location.href = '../../pages/message/index.php';
        </script>
        ";
        }else{
            echo"
            <script>alert(Data gagal Ditambahkan); window.location.href = '../../pages/message/create.php';
            </script>
            ";

    }
    

    ?>