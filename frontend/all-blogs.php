<?php
include '../config/connection.php';

// Ambil semua data blog
$qBlog = "SELECT * FROM blogs";
$result_blog = mysqli_query($connect, $qBlog) or die(mysqli_error($connect));
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
    <a href="index.php#blog" class="btn btn-secondary mb-4">&larr; Kembali</a>

    <h2 class="mb-4">Semua Blog</h2>

    <div class="row g-4">
        <?php while ($blog = mysqli_fetch_object($result_blog)) { ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                   <img src="../storages/blogs/<?php echo $blog->image; ?>" class="card-img-top" alt="<?php echo $blog->title; ?>" style="height:200px; object-fit:cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-uppercase"><?php echo $blog->title; ?></h5>
                        
                        <p class="card-text text-muted">
                            <?php echo substr($blog->content, 0, 100); ?>...
                        </p>
                        <a href="detail-blog.php?id=<?php echo $blog->id; ?>" class="btn btn-success btn-sm mt-auto">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
