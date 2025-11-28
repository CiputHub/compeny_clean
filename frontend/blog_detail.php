<?php
include '../config/connection.php';

// Ambil ID blog
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil data blog berdasarkan ID
$stmt = $connect->prepare("SELECT * FROM blogs WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$blog = $stmt->get_result()->fetch_assoc();

// Kalau blog tidak ditemukan
if (!$blog) {
    echo "<div class='container py-5'><p class='text-danger'>Blog tidak ditemukan.</p></div>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="temp_user/assets/img/brand-putra.jpg" rel="icon">
    <link href="temp_user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <title>PP User Putra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .blog-image {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .related-img {
            height: 180px;
            object-fit: cover;
            border-radius: 8px 8px 0 0;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <!-- Tombol Kembali -->
    <a href="all-blogs.php" class="btn btn-outline-primary mb-4">&larr; Kembali</a>

    <!-- Blog Utama -->
    <div class="card mb-4 shadow-sm border-0">
        <?php if (!empty($blog['image'])): ?>
            <img src="../storages/blogs/<?= htmlspecialchars($blog['image']) ?>" 
                 alt="<?= htmlspecialchars($blog['title']) ?>" 
                 class="w-100 blog-image">
        <?php endif; ?>
        <div class="card-body ">
            <h2 class="text-uppercase"><?= htmlspecialchars($blog['title']) ?></h2>
            <p><?= nl2br(htmlspecialchars($blog['content'])) ?></p>
        </div>
    </div>

    <!-- Blog Terkait -->
    <h4 class="mb-3">Artikel Terkait</h4>
    <div class="row">
        <?php
        $related = $connect->prepare("SELECT id, title, image FROM blogs WHERE id != ? ORDER BY id DESC LIMIT 3");
        $related->bind_param("i", $id);
        $related->execute();
        $result_related = $related->get_result();

        while ($r = $result_related->fetch_assoc()):
        ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm border-0">
                <?php if (!empty($r['image'])): ?>
                    <img src="../storages/blogs/<?= htmlspecialchars($r['image']) ?>" 
                         class="related-img w-100" 
                         alt="<?= htmlspecialchars($r['title']) ?>">
                <?php endif; ?>
                <div class="card-body">
                    <h6 class="card-title text-uppercase"><?= htmlspecialchars($r['title']) ?></h6>
                    <a href="blog_detail.php?id=<?= $r['id'] ?>" class="btn btn-sm btn-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>

</div>

</body>
</html>
