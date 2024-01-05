<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "../config.php";

$title = "Poli - Poliklinik";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

$id = $_GET['id'];

$queryPoli = mysqli_query($koneksi, "SELECT * FROM poli WHERE id = $id");
$poli = mysqli_fetch_assoc($queryPoli);

?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Poli</h1>
        <a href="<?= $main_url ?>poli" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali</a>
      </div>
      <form action="proses-poli.php" method="post">
      <div class="row">
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="nama_poli" class="form-label">Nama Poli</label>
                <input type="text" name="nama_poli" class="form-control" id="nama_poli" value="<?= $poli['nama_poli'] ?>" placeholder="nama poli" required>
            </div>
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $poli['keterangan'] ?>" placeholder="keterangan" required>
            </div>
            <button type="submit" name="update" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Update</button>
        </div>
      </div>
      </form>
    </main>
  
<?php

require "../template/footer.php";

?>