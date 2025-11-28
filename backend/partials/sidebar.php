<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Dapetin role user
$userRole = isset($_SESSION['user_role']) ? strtolower($_SESSION['user_role']) : null;

$qAbouts = "SELECT * FROM abouts LIMIT 1"; 
$result = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
$item = $result->fetch_object();
?>


<body class="d-flex flex-column min-vh-100">
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!--  App Topstrip -->
   
    <!-- Sidebar Start -->
    <aside class="left-sidebar flex-shrink-0">
      <!-- Sidebar scroll-->
      <div>
        <div class="text-center py-3 border-bottom">
            <img src="../../../storages/about/<?= $item->school_logo ?>" 
                alt="Logo Sekolah"
                class="img-fluid mb-2"
                style="max-width: 80px; height: auto; object-fit: contain; background: transparent;">
            <h6 class="text-dark fw-bold text-uppercase mb-0"><?= $item->school_name ?></h6>
            <small class="text-dark-50">Tahun Terbit <?= $item->since ?></small>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
           <li class="sidebar-item">
  <a class="sidebar-link"  href="../dashboard/index.php">
    <i class="ti ti-layout-dashboard"></i> <!-- Dashboard -->
    <span class="hide-menu">Dashboard</span>
  </a>
</li>

<?php if ($userRole === 'admin'): ?>
<li class="sidebar-item">
   <a class="sidebar-link  <?= ($current_dir == 'about') ? 'active' : '' ?>" href="../about/index.php">
    <i class="ti ti-info-circle"></i> <!-- About -->
    <span class="hide-menu">Tentang Kami</span>
  </a>
</li>
<?php endif; ?>

<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'achievement') ? 'active' : '' ?>" href="../achievement/index.php">
    <i class="ti ti-trophy"></i> <!-- Achievement -->
    <span class="hide-menu">Prestasi</span>
  </a>
</li>

<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'announcements') ? 'active' : '' ?>" href="../announcements/index.php">
    <i class="ti ti-speakerphone"></i> <!-- Announcements -->
    <span class="hide-menu">Pengumuman</span>
  </a>
</li>

<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'blog') ? 'active' : '' ?>" href="../blog/index.php">
    <i class="ti ti-notebook"></i> <!-- Blog -->
    <span class="hide-menu">Berita</span>
  </a>
</li>

<?php if ($userRole === 'admin'): ?>
<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'contact') ? 'active' : '' ?>" href="../contact/index.php">
    <i class="ti ti-phone"></i> <!-- Contact -->
    <span class="hide-menu">Kontak</span>
  </a>
</li>
<?php endif; ?>



<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'galleries') ? 'active' : '' ?>" href="../galleries/index.php">
    <i class="ti ti-photo"></i> <!-- Gallery -->
    <span class="hide-menu">Galeri</span>
  </a>
</li>

<?php if ($userRole === 'admin'): ?>
  <li class="sidebar-item">
    <a class="sidebar-link  <?= ($current_dir == 'headmasters') ? 'active' : '' ?>" href="../headmasters/index.php">
      <i class="ti ti-school"></i> <!-- Headmaster -->
      <span class="hide-menu">Kepala Sekolah</span>
    </a>
  </li>
<?php endif; ?>

<?php if ($userRole === 'admin'): ?>

  <li class="sidebar-item ">
    <a class="sidebar-link  <?= ($current_dir == 'majors') ? 'active' : '' ?>" href="../majors/index.php">
      <i class="ti ti-books"></i> <!-- Majors -->
      <span class="hide-menu">Jurusan</span>
    </a>
  </li>
<?php endif; ?>


<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'message') ? 'active' : '' ?>" href="../message/index.php">
    <i class="ti ti-message-circle"></i> <!-- Message -->
    <span class="hide-menu">Pesan Masuk</span>
  </a>
</li>

<?php if ($userRole === 'admin'): ?>
<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'social_media') ? 'active' : '' ?>" href="../social_media/index.php">
    <i class="ti ti-brand-facebook"></i> <!-- Social Media -->
    <span class="hide-menu">Sosial Media</span>
  </a>
</li>
<?php endif; ?>

<?php if ($userRole === 'admin'): ?>
<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'teachers') ? 'active' : '' ?>" href="../teachers/index.php">
    <i class="ti ti-user"></i> <!-- Teacher -->
    <span class="hide-menu">Guru</span>
  </a>
</li>
<?php endif; ?>

<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'testimonials') ? 'active' : '' ?>" href="../testimonials/index.php">
    <i class="ti ti-quote"></i> <!-- Testimoni -->
    <span class="hide-menu">Testimoni</span>
  </a>
</li>

<?php if ($userRole === 'admin'): ?>
  <li class="sidebar-item">
    <a class="sidebar-link  <?= ($current_dir == 'visi_mission') ? 'active' : '' ?>" href="../visi_mission/index.php">
      <i class="ti ti-target"></i> <!-- Visi Misi -->
      <span class="hide-menu">Visi Misi</span>
    </a>
  </li>
<?php endif; ?>

<li class="sidebar-item">
  <a class="sidebar-link  <?= ($current_dir == 'qna') ? 'active' : '' ?>" href="../qna/index.php">
    <i class="ti  ti-question-mark"></i> <!-- Visi Misi -->
    <span class="hide-menu">Tanya Jawab</span>
  </a>
</li>

  <!-- Menu User hanya untuk superadmin -->
              <?php if ($userRole === 'admin'): ?>
<li class="sidebar-item">
  <a class="sidebar-link <?= ($current_dir == 'users') ? 'active' : '' ?>" href="../users/index.php">
    <i class="ti ti-users"></i>
    <span class="hide-menu">User</span>
  </a>
</li>
<?php endif; ?>

              <?php if ($userRole === 'admin'): ?>
<li class="sidebar-item">
   <a class="sidebar-link <?= ($current_dir == 'user_activity') ? 'active' : '' ?>" href="../user_activity/index.php">
    <i class="bi bi-clock-history"></i>
    Semua Aktivitas User
  </a>
</li>
<?php endif; ?>


          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->