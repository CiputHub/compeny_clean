<?php
include '../config/connection.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($connect, $_GET['search']) : '';

$qUpdate = "SELECT * FROM galleries";
if ($search != '') {
    $qUpdate .= " WHERE title LIKE '%$search%'";
}
$qUpdate .= " ORDER BY id DESC LIMIT 20"; // limit biar ringan

$result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));

$data = [];
while ($item = $result->fetch_object()) {
    $data[] = [
        'id'    => $item->id,
        'title' => $item->title,
        'image' => $item->image,
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
