<?php
include '../config/connection.php';

$search = isset($_GET['q']) ? mysqli_real_escape_string($connect, $_GET['q']) : '';

$qTeam = "SELECT * FROM teachers";
if ($search != '') {
    $qTeam .= " WHERE teachers_name LIKE '%$search%' 
                OR teachers_major LIKE '%$search%'";
}
$qTeam .= " ORDER BY id DESC";

$result = mysqli_query($connect, $qTeam) or die(mysqli_error($connect));

$data = [];
while ($item = mysqli_fetch_assoc($result)) {
    $data[] = $item;
}

header('Content-Type: application/json');
echo json_encode($data);
