  <?php
include '../config/connection.php';

$qAbouts = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
$item =$result->fetch_object(); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Smk Negeri 3 Banjar</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../storages/about/<?= $item->school_logo?>" rel="icon">
  <link href="temp_user/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
 <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">


  <!-- Vendor CSS Files -->
  <link href="temp_user/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="temp_user/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="temp_user/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="temp_user/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="temp_user/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- CSS Lightbox -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">


  <!-- Main CSS File -->
  <link href="temp_user/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  
  <style>
  :root {
    --bs-body-font-family: 'Poppins', sans-serif; /* ganti ke font yang kamu mau */
  }
</style>
</head>
<script>
  function updateClock() {
    const now = new Date();
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const tanggal = now.toLocaleDateString('id-ID', options);
    const jam = now.toLocaleTimeString('id-ID');

    document.getElementById('jam-navbar').innerHTML = `
      <span>${jam}</span><br>
      <small style="font-size:12px;">${tanggal}</small>
    `;
  }
  setInterval(updateClock, 1000);
  updateClock();
</script>



<!-- JS Lightbox (di bawah sebelum </body>) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<body>

  <!-- ======= Header ======= -->