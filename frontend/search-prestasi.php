<?php
include '../config/connection.php';
header('Content-Type: application/json');

// Ambil query pencarian
$q = isset($_GET['q']) ? mysqli_real_escape_string($connect, $_GET['q']) : '';

// Query data prestasi
$sql = "SELECT * FROM achievements 
        WHERE title LIKE '%$q%' OR description LIKE '%$q%'
        ORDER BY id DESC";

$result = mysqli_query($connect, $sql);

$data = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'description' => $row['description'],
            'image' => $row['image']
        ];
    }
}

// Return JSON
echo json_encode($data);
