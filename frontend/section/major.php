<?php
include '../config/connection.php';

$qMajors = "SELECT * FROM majors ORDER BY id DESC LIMIT 6";
$result = mysqli_query($connect, $qMajors) or die(mysqli_error($connect));
?>

<section id="majors" class="majors section light-background py-5">
  <div class="container">
     <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <!-- <span>Jurusan Sekolah</span> -->
        <h2>Jurusan</h2>
        <p>Jurusan-jurusan yang ada di smkn 3 banjar</p>
      </div><!-- End Section Title -->

    <div class="swiper majors-swiper">
      <div class="swiper-wrapper">
        <?php while($item = mysqli_fetch_assoc($result)) { ?>
        <div class="swiper-slide">
       <div class="card shadow text-center border-0" style="border-radius: 15px; overflow: hidden;">

            <a href="majors_detail.php?id=<?php echo $item['id']; ?>">
            <img src="../storages/majors/<?php echo $item['majors_image']; ?>" 
                class="card-img-top p-3" 
                alt="<?php echo $item['majors_name']; ?>" 
                style="height:200px; object-fit:contain;">
            </a>
            <div class="card-body">
            <h6 class="card-title fw-semibold m-0"><?php echo $item['majors_name']; ?></h6>
            </div>
        </div>
        </div>

        <?php } ?>
      </div>

      <!-- Pagination & Navigation -->
      <!-- <div class="swiper-pagination mt-3"></div> -->
      <!-- <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div> -->
    </div>
  </div>
</section>

<!-- SwiperJS Config -->
<script>
  document.addEventListener("DOMContentLoaded", function () {
    new Swiper(".majors-swiper", {
      loop: true,
      speed: 600,
      autoplay: {
        delay: 3000,
      },
      slidesPerView: 1,
      spaceBetween: 20,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 3,
          spaceBetween: 30,
        }
      }
    });
  });
</script>
