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

if($dataUser['jabatan'] == 3){
    echo "<script>
            alert('Halaman tidak ditemukan');
            window.location = '../index.php';
        </script>";
    exit();
}

if(isset($_GET['msg'])){
    $msg = $_GET['msg'];
}else{
    $msg = '';
}

$alert = "";
if($msg == 'added'){
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><i class="bi bi-bag-check-fill align-top"></i> Tambah poli baru berhasil !</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Poli</h1>
        <a href="<?= $main_url ?>poli" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali</a>
      </div>
      <form action="proses-poli.php" method="post">
      <div class="row">
        <div class="col-lg-8">
            <?php if($msg !== ''){
                echo $alert;
            }
            ?>
            <div class="form-group mb-3">
                <label for="nama_poli" class="form-label">Nama Poli</label>
                <input type="text" name="nama_poli" class="form-control" id="nama_poli" placeholder="nama poli" required>
            </div>
            <div class="form-group mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="keterangan" required>
            </div>
            <button type="reset" class="btn btn-outline-danger btn-sm"><i class="bi bi-x-lg align-top"></i> Reset</button>
            <button type="submit" name="simpan" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Simpan</button>
        </div>
      </div>
      </form>
    </main>
  
<?php

require "../template/footer.php";

?>