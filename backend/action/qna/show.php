<?php
if(!isset($_GET['id'])){
    echo "
    <script>
        alert('Tidak Bisa Memilih ID ini');
        window.location.href='../../pages/qna/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM qna WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die (mysqli_error($connect));

$qna = $result->fetch_object();
if(!$qna) {
    die("data tidak ditemukan");
}
