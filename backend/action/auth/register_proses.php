<?php
    session_start();
    include '../../app.php';//koneksi databases

    //cek apakah form sudah di submit
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = escapeString($_POST['name']);
        $email = escapeString($_POST['email']);
        $password = $_POST['password'];

        //cek apakah email sudah terdaftar
        $cekQuery = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connect, $cekQuery);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>
                alert('email sudah terdaftar');
                window.location.href='../../pages/user/register.php';
                </script>";
            exit();
        }
        //hash password = fungsi mengubah/convert data password ke sandi encrypt
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        //simpan data baru ke databases
        $insertQuery = "INSERT INTO users (name, email, password) VALUES ('$name','$email', '$hashPassword')";
        if (mysqli_query($connect, $insertQuery)) {
            echo "<script>
                alert('Register Berhasil, Silahkan Login');
                window.location.href='../../pages/user/login.php';
                </script>";
        } else {
            echo "<script>
                alert('Register gagal!');
                window.location.href='../../pages/user/register.php';
                </script>";
            
        }
    }
?>