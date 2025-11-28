<?php
if(!isset($_GET['id'])){
    echo "
    <script>
        alert('Tidak Bisa Memilih ID ini');
        window.location.href='../../pages/teachers/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM teachers WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die (mysqli_error($connect));

$teachers = $result->fetch_object();
if(!$teachers) {
    die("data tidak ditemukan");
}
