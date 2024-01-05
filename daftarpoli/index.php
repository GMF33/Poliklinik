<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "../config.php";

$title = "Daftar Poli - Poliklinik";

require "../template/header.php";
require "../template/navbar.php";
require "../template/sidebar.php";

// fungsi penomoran otomatis
// RM-001-121023

$today   = date('dmy');
$queryNo = mysqli_query($koneksi, "SELECT max(no_rm) as maxno FROM daftar WHERE right(no_rm, 6) = '$today'");
$dataNo  = mysqli_fetch_assoc($queryNo);
$noRM    = $dataNo['maxno'];

$noUrut = (int) substr($noRM, 3, 3);

$noUrut++;

$noRM = 'RM-' . sprintf("%03s", $noUrut) . '-' . date('dmy');

if(isset($_GET['msg'])){
  $msg = $_GET['msg'];
}else{
  $msg = '';
}

$alert = "";
if($msg == 'added'){
  $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong><i class="bi bi-bag-check-fill align-top"></i> Tambah data poli berhasil !</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Poli</h1>
        <a href="<?= $main_url ?>daftarpoli" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali</a>
      </div>
      <form action="proses-data.php" method="post">
      <div class="row">
        <?php if($msg !== ''){
          echo $alert;
        }
        ?>
        <div class="col-lg-6 pe-4">
            <div class="form-group mb-3">
                <label for="no" class="form-label">No Rekam Medis</label>
                <input type="text" name="no_rm" class="form-control" id="no_rm" value="<?= $noRM ?>" readonly>
            </div>
            <div class="form-group mb-3">
                <label for="poli" class="form-label">Pilih Poli</label>
                <select name="poli" id="poli" class="form-select" required>
                    <option value="">-- Pilih Poli --</option>
                    <option value="1">Anak</option>
                    <option value="2">THT</option>
                    <option value="3">Mata</option>
                    <option value="4">Jantung</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="tgl" class="form-label">Pilih Jadwal</label>
                <input type="date" name="tgl" class="form-control" id="tgl" value="<?= date('Y-m-d') ?>">
            </div> 
            <div class="form-group mb-3">
                <label for="keluhan" class="form-label">Keluhan</label>
                <textarea name="keluhan" id="keluhan" class="form-control" placeholder="keluhan pasien"></textarea>
              </div>  
              <button type="reset" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-lg align-top"></i> Reset</button>
              <button type="submit" name="simpan" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Simpan</button>
        </div>
      </form>

  
<?php

require "../template/footer.php";

?>