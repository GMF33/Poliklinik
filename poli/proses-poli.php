<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "..//config.php";

// tambah obat baru
if(isset($_POST['simpan'])){
    $nama_poli    = trim(htmlspecialchars($_POST['nama_poli']));
    $keterangan      = trim(htmlspecialchars($_POST['keterangan']));

    mysqli_query($koneksi, "INSERT INTO poli VALUES (null, '$nama_poli', '$keterangan')");
    
    header('location: index.php?msg=added');
        return;

}



?>