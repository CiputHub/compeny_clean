<section id="stats" class="stats section">
  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="stats-item text-center w-100 h-100">
          <h1 id="jam" style="font-size: 100px; font-weight: bold;">--:--:--</h1>
          <p id="tanggal" style="font-size: 32px; margin-top: 15px;">--</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function updateTime() {
    const now = new Date();
    const jam = now.toLocaleTimeString('id-ID', { hour12: false });
    const tanggal = now.toLocaleDateString('id-ID', {
      weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
    });
    document.getElementById('jam').innerText = jam;
    document.getElementById('tanggal').innerText = tanggal;
  }

  setInterval(updateTime, 1000);
  updateTime();
</script>
