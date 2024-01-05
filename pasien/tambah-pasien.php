<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "../config.php";

$title = "Tambah User - Poliklinik";

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

?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pasien Baru</h1>
        <a href="<?= $main_url ?>pasien" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali</a>
      </div>
      <form action="proses-pasien.php" method="post">
      <div class="row">
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama pasien" required>
            </div>
            <div class="form-group mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" cols="" rows="" class="form-control" placeholder="masukkan alamat" required></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="nm_ktp" class="form-label">No KTP</label>
                <input type="text" name="nm_ktp" class="form-control" id="nm_ktp" placeholder="masukkan no ktp" required>
            </div>
            <div class="form-group mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="masukkan no hp" required>
            </div>
            <div class="form-group mb-3">
                <label for="no_rm" class="form-label">No RM</label>
                <input type="text" name="no_rm" class="form-control" id="no_rm" placeholder="" required>
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