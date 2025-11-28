<?php
include '../config/connection.php';
include 'partials/header.php';

// Ambil 3 blog terbaru
$qBlog = "SELECT * FROM blogs ORDER BY id DESC LIMIT 3";
$result_blog = mysqli_query($connect, $qBlog) or die(mysqli_error($connect));
?>


<section id="blog" class="services section">
   <div class="container section-title" data-aos="fade-up">
        <!-- <span>Artikel<br></span> -->
        <h2>Berita</h2>
        <p>berita berita yang ada di sekolah</p>
      </div><!-- End Section Title -->
   
  </div>
    <div class="row g-4 px-5" >
      <?php while ($item = $result_blog->fetch_object()): ?>
  <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                   <img src="../storages/blogs/<?php echo $item->image; ?>" class="card-img-top" alt="<?php echo $item->title; ?>" style="height:200px; object-fit:cover;">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase"><?php echo $item->title; ?></h5>
                        
                        <p class="card-text text-muted">
                            <?php echo substr($item->content, 0, 100); ?>...
                        </p>
                        <!-- <a href="detail-blog.php?id=<?php echo $item->id; ?>" class="btn btn-success btn-sm">Baca Selengkapnya</a> -->
                    </div>
                </div>
            </div>
            
 
        <!-- Tombol Lihat Selengkapnya muncul di bawah card ke-2 -->
      
    
      <?php endwhile; ?>
        <div class="col-12 text-center mt-3">
          <a href="all-blogs.php" class="btn btn-success">
            Lihat Selengkapnya <i class="bi bi-arrow-right"></i>
          </a>
        </div>
    </div>
  </div>
</section>