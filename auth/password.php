<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: login.php');
  exit();
}

require "../config.php";

$title = "Password - Poliklinik";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Ganti Password</h1>
    </div>
    <form action="../user/proses-user.php" method="post">
        <div class="form-group mb-3 col-6">
            <label for="oldpass" class="form-label">Password lama</label>
            <input type="password" name="oldpass" class="form-control" id="oldpass" placeholder="Password lama" autocomplete="off" required>
        </div>
        <div class="form-group mb-3 col-6">
            <label for="newpass" class="form-label">Password baru</label>
            <input type="password" name="newpass" class="form-control" id="newpass" placeholder="Password baru" autocomplete="off" required>
        </div>
        <div class="form-group mb-3 col-6">
            <label for="confpass" class="form-label">Konformasi password</label>
            <input type="password" name="confpass" class="form-control" id="confpass" placeholder="Konfirmasi password" autocomplete="off" required>
        </div>
        <button type="reset" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-lg align-top"></i> Reset</button>
        <button type="submit" name="ganti-password" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Simpan</button>
    </form>
</main>
  
<?php

require "../template/footer.php";

?>