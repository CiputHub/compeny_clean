<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
    echo "<script>
    alert('anda sudah login');
    window.location.href='../dashboard/index.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register</title>
 <link rel="stylesheet" href="../../template-admin/assets/css/styles.min.css">
  <link rel="shortcut icon" href="../../template-admin/assets/images/">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="min-height:100vh;">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow p-4">
          <h4 class="mb-4 text-center"> Register</h4>

          <form action="../../action/auth/register_proses.php" method="POST">
         
            <!-- username -->
            <div class="mb-3">
              <label for="nameInput" class="form-label"> name</label>
              <input type="text" class="form-control" name="name" id="nameInput" placeholder="Masukkan name..." required>
            </div>
            <!-- email -->
            <div class="mb-3">
              <label for="emailInput" class="form-label"> Email</label>
              <input type="email" class="form-control" name="email" id="emailInput" placeholder="Masukkan email..." required>
            </div>

            <!-- Password -->
            <div class="mb-3">
              <label for="passwordInput" class="form-label"> Password</label>
              <input type="password" class="form-control" name="password" id="passwordInput" placeholder="Masukkan password..." required>
            </div>

            <!-- Tombol -->
            <div class="d-grid">
              <button class="btn btn-primary" type="submit"> Register</button>
            </div>
          </form>
          <p class="text-center mt-3 ">Sudah Punya Akun? <u><a href="login.php"> login di sini</a></u></p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>

<!-- JS -->
<?php

include '../../partials/script.php';
?>