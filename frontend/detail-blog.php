<?php
include '../config/connection.php';

// Ambil ID dari URL
if (!isset($_GET['id'])) {
    echo "<script>alert('Blog tidak ditemukan'); window.location='all-blogs.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// Ambil data blog berdasarkan ID
$qBlog = "SELECT * FROM blogs WHERE id = $id";
$result_blog = mysqli_query($connect, $qBlog) or die(mysqli_error($connect));
$blog = mysqli_fetch_object($result_blog);

if (!$blog) {
    echo "<script>alert('Blog tidak ditemukan'); window.location='all-blogs.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="temp_user/assets/img/brand-putra.jpg" rel="icon">
    <link href="temp_user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <title>PP User Putra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container py-4">
    <a href="all-blogs.php" class="btn btn-secondary mb-4">&larr; Kembali</a>
    
    <div class="card shadow-sm border-0">
        <!-- Banner Gambar -->
        <div class="text-center bg-dark">
            <img src="../storages/blogs/<?php echo $blog->image; ?>" 
                 alt="<?php echo $blog->title; ?>"  
                 class="img-fluid" 
                 style="max-height: 500px; width: auto; object-fit: contain;">
        </div>

        <!-- Konten -->
        <div class="card-body">
            <h2 class="card-title text-uppercase mb-3">
                <?php echo $blog->title; ?>
            </h2>
            <p class="card-text text-muted" style="line-height:1.7;">
                <?php echo nl2br($blog->content); ?>
            </p>
        </div>
    </div>
</div>

<style>
.blog-image {
    max-height: 400px;
    width: 100%;
    object-fit: cover;
}
</style>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
