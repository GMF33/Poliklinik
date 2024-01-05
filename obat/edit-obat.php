<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "../config.php";

$title = "Edit Obat - Poliklinik";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

$id = $_GET['id'];

$queryObat = mysqli_query($koneksi, "SELECT * FROM obat WHERE id = $id");
$obat = mysqli_fetch_assoc($queryObat);

?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Obat</h1>
        <a href="<?= $main_url ?>obat" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali</a>
      </div>
      <form action="proses-obat.php" method="post">
      <div class="row">
        <div class="col-lg-8">
            <input type="hidden" name="id" value="<?= $obat['id'] ?>">
            <div class="form-group mb-3">
                <label for="nama_obat" class="form-label">Nama obat</label>
                <input type="text" name="nama_obat" class="form-control" id="nama_obat" value="<?= $obat['nama_obat'] ?>" placeholder="nama obat" required>
            </div>
            <div class="form-group mb-3">
                <label for="kemasan" class="form-label">Kemasan</label>
                <input type="text" name="kemasan" class="form-control" id="kemasan" value="<?= $obat['kemasan'] ?>" placeholder="kemasan" required>
            </div>
            <div class="form-group mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" id="harga" value="<?= $obat['harga'] ?>" placeholder="harga" required>
            </div>
            <button type="submit" name="update" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Update</button>
        </div>
      </div>
      </form>
    </main>
  
<?php

require "../template/footer.php";

?>