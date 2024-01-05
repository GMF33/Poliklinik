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
if($msg == 'deleted'){
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><i class="bi bi-bag-check-fill align-top"></i> Hapus poli berhasil !</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

if($msg == 'updated'){
    $alert = '<div class="alert alert-success alert-dismissible fade show updated" role="alert">
    <strong><i class="bi bi-bag-check-fill align-top"></i> Edit poli berhasil !</strong>
  </div>';
}

?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 min-vh-100">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Poli</h1>
    </div>
    <?php
    if($msg !== ''){
        echo $alert;
    }
    ?>
    <a href="<?= $main_url ?>poli/tambah-poli.php" class="btn btn-outline-secondary btn-sm mb-3" title="tambah poli baru"><i class="bi bi-plus-lg align-top"></i> Poli Baru</a>  
    <table class="table table-responsive table-hover" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Poli</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $queryPoli = mysqli_query($koneksi, "SELECT * FROM poli");
            while ($poli = mysqli_fetch_assoc($queryPoli)){
            
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $poli['nama_poli'] ?></td>
                    <td><?= $poli['keterangan'] ?></td>
                    <td>
                        <a href="edit-poli.php?id=<?= $poli['id'] ?>" class="btn btn-sm btn-outline-warning" title="edit poli"><i class="bi bi-pen align-top"></i></a>
                        <a href="proses-poli.php?id=<?= $poli['id'] ?>&aksi=hapus-poli" onclick="return confirm('Anda yakin ingin menghapus ?')" class="btn btn-sm btn-outline-danger" title="hapus poli"><i class="bi bi-trash align-top"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

<script>
    window.setTimeout(function() {
        $('.updated').fadeOut();
    }, 5000);
</script>
  
<?php

require "../template/footer.php";

?>