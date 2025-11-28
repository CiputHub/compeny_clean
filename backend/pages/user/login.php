<?php
session_start();

// Jika sudah login, langsung redirect + alert
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    echo "<script>
        alert('Anda sudah login!');
        window.location.href='../dashboard/index.php';
    </script>";
    exit();


// simpan ke riwayat login
$qHistory = "INSERT INTO login_history (user_id, activity) 
             VALUES ('{$user['id']}', 'login')";
mysqli_query($connect, $qHistory);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Admin</title>
  <link rel="stylesheet" href="../../template-admin/assets/css/styles.min.css">
  <link rel="shortcut icon" href="../../template-admin/assets/images/">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="min-height:100vh;">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
        <div class="card shadow p-4">
          <h4 class="mb-4 text-center"> Login</h4>

          <form action="../../action/auth/login_proses.php" method="POST">
         
            <div class="mb-3">
              <label for="nameInput" class="form-label"> Nama</label>
              <input type="text" class="form-control" name="name" id="nameInput" placeholder="Masukkan name..." required>
            </div>
         
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
              <button class="btn btn-primary" type="submit"> Login</button>
            </div>
          </form>
            <!-- <p class="text-center mt-3 ">Belum Punya Akun? <u><a href="./register.php"> Registrasi di sini</a></u></p> -->
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
 