<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "../config.php";

$title = "Edit User - Poliklinik";

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

$id = $_GET['id'];

$queryPasien = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id ='$id'");
$pasien = mysqli_fetch_assoc($queryPasien);

?>



    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Pasien</h1>
        <a href="<?= $main_url ?>pasien" class="text-decoration-none"><i class="bi bi-arrow-left"></i> Kembali</a>
      </div>
      <form action="proses-pasien.php" method="post">
      <div class="row">
        <div class="col-lg-8">
            <input type="hidden" name="id" value="<?= $pasien['id'] ?>">
            <div class="form-group mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama pasien" value="<?= $pasien['nama'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" cols="" rows="" class="form-control" placeholder="masukkan alamat" required><?= $pasien['alamat'] ?></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="nm_ktp" class="form-label">No KTP</label>
                <input type="text" name="nm_ktp" class="form-control" id="nm_ktp" placeholder="masukkan no ktp" value="<?= $pasien['nm_ktp'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="masukkan no hp" value="<?= $pasien['no_hp'] ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="no_rm" class="form-label">No RM</label>
                <input type="text" name="no_rm" class="form-control" id="no_rm" placeholder="" value="<?= $pasien['no_rm'] ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-outline-primary btn-sm"><i class="bi bi-save align-top"></i> Update</button>
        </div>
      </div>
      </form>
    </main>
  
<?php

require "../template/footer.php";

?>