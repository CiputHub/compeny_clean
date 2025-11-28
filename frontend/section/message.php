<?php
include '../config/connection.php';

$qAbouts = "SELECT * FROM abouts";
$result_about = mysqli_query($connect, $qAbouts) or die(mysqli_error($connect));
$itemAbout = $result_about->fetch_object(); 

$qContact = "SELECT * FROM contacts";
$result_contact = mysqli_query($connect, $qContact) or die(mysqli_error($connect));
$itemContact = $result_contact->fetch_object(); 

$qMessage = "SELECT * FROM message";
$result_message = mysqli_query($connect, $qMessage) or die(mysqli_error($connect));
$itemMessage = $result_message->fetch_object(); 
?> 

<section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <!-- <span>Kontak SMK </span> -->
        <h2>Kontak</h2>
        <p>Jika ada yang ingin disampaikan silahkan hubungi kami</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4  align-items-stretch">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p ><?= $itemAbout->alamat ?></p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>kontak kami</h3>
                  <p><?= $itemContact->contact ?></p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email</h3>
                  <p><?= $itemContact->email ?></p>
                </div>
              </div><!-- End Info Item -->

              <iframe src="<?= $itemContact->link_map ?>" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

         <!-- Kanan: Form -->
      <div class="col-lg-7 d-flex">
        <form action="action/contact/create_contact.php" method="post" 
              class="w-100 bg-white shadow rounded p-4 d-flex flex-column justify-content-between"
              data-aos="fade-up" data-aos-delay="200">
          
          <div class="row g-3 flex-grow-1">
            <div class="col-md-6">
              <label for="name-field" class="form-label">Nama</label>
              <input type="text" name="name" id="name-field" class="form-control" placeholder="Masukan Nama..." required>
            </div>

            <div class="col-md-6">
              <label for="email-field" class="form-label">Email</label>
              <input type="email" name="email" id="email-field" class="form-control" placeholder="Masukan Email..." required>
            </div>

            <div class="col-md-12">
              <label for="telepon-field" class="form-label">Nomor</label>
              <input type="tel" name="telepon" id="telepon-field" class="form-control" placeholder="Masukan Nomor..." required>
            </div>

            <div class="col-md-12">
              <label for="message-field" class="form-label">Pesan</label>
              <textarea name="message" id="message-field" rows="8" class="form-control" placeholder="Masukan Pesan..." required></textarea>
            </div>
          </div>

          <div class="text-center mt-3">
            <button type="submit" name="tombol" class="btn btn-success rounded-pill px-4 py-2 text-light">Kirim Pesan</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</section>
