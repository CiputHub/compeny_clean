<?php
include 'partials/header.php';
?>

<body class="index-page">

<?php include 'partials/navbar.php';?>

  <main class="main">

    <!-- Hero Section -->
      <?php include 'section/home.php';?>
   <!-- /Hero Section -->

    <!-- Featured Services Section -->
     <?php include 'section/featured-services.php';?>
    <!-- /Featured Services Section -->

    <!-- About Section -->
     
     <?php include 'section/about.php';?>
  <!-- /About Section -->

    <!-- Stats Section -->
 

   <!-- /Stats Section -->

    <!-- headmaster -->
      <?php include 'section/headmaster.php';?>
    <!-- headmaster tutup -->
       <?php include 'section/blog.php';?>

      <!-- Services Section -->
      <?php include 'section/achievements.php';?>
    
   <!-- /Services Section -->
  <!-- Testimonials Section -->
      <?php include 'section/testimoni.php';?>
  <!-- /Testimonials Section -->

    <!-- Portfolio Section -->
      <?php include 'section/galeri.php';?>
   <!-- /Portfolio Section -->

  
    <!-- Call To Action Section -->
     <?php include 'section/major.php';?>
    <!-- /Call To Action Section -->

    <!-- Team Section -->
      <?php include 'section/team.php';?>
  <!-- /Team Section -->

    <!-- Contact Section -->
       <?php include 'section/message.php';?>
   <!-- /Contact Section -->

   <?php include 'section/qna.php';?>

  </main>

  <?php include 'partials/footer.php';?>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  
  <?php include 'partials/script.php';?>
  
</body>

</html>