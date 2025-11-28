<?php
if(!isset($_GET['id'])){
    echo "
    <script>
        alert('Tidak Bisa Memilih ID ini');
        window.location.href='../../pages/galleries/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM galleries WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die (mysqli_error($connect));

$galleries = $result->fetch_object();
if(!$galleries) {
    die("data tidak ditemukan");
}
