<?php
if(!isset($_GET['id'])){
    echo "
    <script>
        alert('Tidak Bisa Memilih ID ini');
        window.location.href='../../pages/contact/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM contacts WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die (mysqli_error($connect));

$contact = $result->fetch_object();
if(!$contact) {
    die("data tidak ditemukan");
}
