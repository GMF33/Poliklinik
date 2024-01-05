<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "..//config.php";

// tambah pasien baru
if(isset($_POST['simpan'])){
    $nama   = trim(htmlspecialchars($_POST['nama']));
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $nm_ktp  = trim(htmlspecialchars($_POST['nm_ktp']));
    $no_hp   = trim(htmlspecialchars($_POST['no_hp']));
    $no_rm   = trim(htmlspecialchars($_POST['no_rm']));
    $id     = date('ymdhis');

    mysqli_query($koneksi, "INSERT INTO pasien VALUES ('$id', '$nama', '$alamat', '$nm_ktp', '$no_hp', '$no_rm')");
    echo "<script>
            alert(Pasien baru berhasil di registrasi !');
            window.location = 'tambah-pasien.php';
        </script>";
        return;

}

if (@$_GET['aksi'] == 'hapus-pasien'){
    $id  = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM pasien WHERE id = '$id'");
    echo "<script>
            alert('Pasien berhasil di hapus !');
            window.location = 'index.php';
        </script>";
    return;
}

// update pasien baru
if(isset($_POST['update'])){
    $nama    = trim(htmlspecialchars($_POST['nama']));
    $alamat  = trim(htmlspecialchars($_POST['alamat']));
    $nm_ktp  = trim(htmlspecialchars($_POST['nm_ktp']));
    $no_hp   = trim(htmlspecialchars($_POST['no_hp']));
    $no_rm   = trim(htmlspecialchars($_POST['no_rm']));
    $id      = trim(htmlspecialchars($_POST['id']));

    mysqli_query($koneksi, "UPDATE pasien SET
                            nama         = '$nama',
                            alamat       = '$alamat',
                            nm_ktp       = '$nm_ktp',
                            no_hp        = '$no_hp',
                            no_rm        = '$no_rm'
                            WHERE id = '$id'");
    echo "<script>
            alert(Data pasien berhasil diperbarui !');
            window.location = 'index.php';
        </script>";
        return;

}


?>