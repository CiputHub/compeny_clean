   
 <?php
include '../config/connection.php';

// Ambil 3 blog terbaru
$qUpdate = "SELECT * FROM testimonials ORDER BY id";
$result = mysqli_query($connect, $qUpdate) or die(mysqli_error($connect));
?>
  <section id="testimonials" class="testimonials section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <!-- <span>Testimonial</span> -->
        <h2>Testimoni</h2>
        <p>Berisi testimoni dari alumni atau siapapun</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

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
          <div class="swiper-wrapper">
             <?php while ($item = $result->fetch_object()): ?>
            <div class="swiper-slide">
            <div class="testimonial-item">
  <p>
    <i class="bi bi-quote quote-icon-left"></i>
    <span><?=$item->message?></span>
    <i class="bi bi-quote quote-icon-right"></i>
  </p>

  <img src="../storages/testimonials/<?=$item->image?>" class="testimonial-img" alt="">
  <h3><?=$item->name?></h3>
  <h4><?=$item->status?>

<div class="rating ">
    <?php for ($i = 1; $i <= 5; $i++): ?>
      <?php if ($i <= $item->rating): ?>
        <i class="bi bi-star-fill text-warning"></i>
      <?php else: ?>
        <i class="bi bi-star text-warning"></i>
      <?php endif; ?>
    <?php endfor; ?>
  </div></h4>

  <!-- Rating Bintang -->
  
</div>

            </div><!-- End testimonial item -->
              <?php endwhile; ?>
            
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section>