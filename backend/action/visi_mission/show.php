    <?php
if(!isset($_GET['id'])){
    echo "
    <script>
        alert('Tidak Bisa Memilih ID ini');
        window.location.href='../../pages/visi_mission/index.php';
        </script>
    ";
}

$id = $_GET['id'];

$qSelect = "SELECT * FROM visi_missions WHERE id='$id'";
$result = mysqli_query($connect, $qSelect) or die (mysqli_error($connect));

$visi_mission = $result->fetch_object();
if(!$visi_mission) {
    die("data tidak ditemukan");
}
