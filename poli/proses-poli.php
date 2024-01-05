<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "..//config.php";

// tambah poli baru
if(isset($_POST['simpan'])){
    $nama_poli    = trim(htmlspecialchars($_POST['nama_poli']));
    $keterangan      = trim(htmlspecialchars($_POST['keterangan']));

    mysqli_query($koneksi, "INSERT INTO poli VALUES (null, '$nama_poli', '$keterangan')");
    
    header('location: index.php?msg=added');
        return;

}

// hapus poli
if(@$_GET['aksi'] == 'hapus-poli'){
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM poli WHERE id = $id");

    header('location: index.php?msg=deleted');
    return;
}

// update poli
if(isset($_POST['update'])){
    $id                 = trim(htmlspecialchars($_POST['id']));
    $nama_poli          = trim(htmlspecialchars($_POST['nama_poli']));
    $keterangan         = trim(htmlspecialchars($_POST['keterangan']));

    mysqli_query($koneksi, "UPDATE poli SET nama_poli = '$nama_poli', keterangan = '$keterangan', WHERE id = $id");
    
    header('location: index.php?msg=updated');
        return;

}


?>