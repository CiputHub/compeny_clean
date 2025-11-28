<?php
include_once __DIR__ . '../../../config/connection.php';

$qAbouts = "SELECT * FROM abouts LIMIT 1"; // ambil 1 data saja
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
$item = $result->fetch_object();
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $item->school_name ?></title>
  <link rel="shortcut icon" type="image/png" href="../../../storages/about/<?= $item->school_logo ?>" />
  <link rel="stylesheet" href="../../template-admin/assets/css/styles.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css">


</head>
 


    
    

