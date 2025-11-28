<?php
if(!isset($_GET['id'])){
    echo "
    <script>
        alert('Tidak Bisa Memilih ID ini');
        window.location.href='../../pages/testimonials/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM testimonials WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die (mysqli_error($connect));

$testimonials = $result->fetch_object();
if(!$testimonials) {
    die("data tidak ditemukan");
}
