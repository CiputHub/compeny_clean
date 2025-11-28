  <?php
include '../config/connection.php';
include 'partials/header.php';

$qAbouts = "SELECT * FROM abouts";
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
$item =$result->fetch_object(); 

?>
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="../storages/about/<?= $item->school_logo?>" alt="">
        <h1 class="sitename"><?= $item->school_name?></h1>
        <!-- <div id="jam-navbar" class="ms-3 fw-bold text-primary"></div> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">Tentang Kami</a></li>
          <li><a href="#blog">Berita</a></li>
          <li><a href="#achievement">Prestasi</a></li>
          <li><a href="#portfolio">Galeri</a></li>
          <!-- <li><a href="#team"></a></li> -->
          <li class="dropdown"><a ><span>Lainnya</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#visi-misi">Visi misi </a></li>
              <li><a href="#sambutan">Sambutan</a></li>
               <li><a href="#testimonials">Testimoni </a></li>
              <li><a href="#majors">Jurusan </a></li>
              <!-- <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li> -->
              <li><a href="#team">Guru </a></li>
              <!-- <li><a href="#qna">Qna</a></li> -->
            
            </ul>
          </li>
          <li><a href="#contact">Kontak</a></li>
          <li><a href="#qna">Tanya Jawab</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <!-- <a class="btn-getstarted" href="index.html#about">Get Started</a> -->

    </div>
  </header>