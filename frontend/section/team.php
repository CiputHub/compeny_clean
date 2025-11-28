   
 <?php
include '../config/connection.php';

// Ambil 3 blog terbaru
$qUpdate = "SELECT * FROM teachers ORDER BY id DESC LIMIT 6";
$result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
?>
  <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <!-- <span>Daftar Guru</span> -->
        <h2>Guru</h2>
        <p>Beberapa guru yang ada di smkn 3 banjar</p>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>

        
             <div class="swiper-wrapper h-100">
            <?php while ($item = $result->fetch_object()): ?>
              <div class="swiper-slide">
                <div class="member" data-aos="fade-up" data-aos-delay="100">
                    <div class="pic">
                    <img src="../storages/teachers/<?= $item->teachers_photo?>" class="img-fluid" alt="">
                    </div>
                    <div class="member-info">
                    <h4><?= $item->teachers_name?></h4>
                    <!-- <span><?= $item->teachers_major?></span> -->
                    </div>
                </div>
                </div>

             <?php endwhile; ?>
        </div>
        </div>
             </div>
            
          <div class="swiper-pagination"></div>
        </div>
        <div class="text-center mt-4">
      <a href="all-team.php" class="btn btn-success">Lihat Semua Guru</a>
    </div>

        

        

    </section>