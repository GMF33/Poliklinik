<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "..//config.php";

// tambah obat baru
if(isset($_POST['simpan'])){
    $nama_obat    = trim(htmlspecialchars($_POST['nama_obat']));
    $kemasan      = trim(htmlspecialchars($_POST['kemasan']));
    $harga        = trim(htmlspecialchars($_POST['harga']));

    mysqli_query($koneksi, "INSERT INTO obat VALUES (null, '$nama_obat', '$kemasan', '$harga')");
    
    header('location: tambah-obat.php?msg=added');
        return;

}

// hapus obat
if(@$_GET['aksi'] == 'hapus-obat'){
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM obat WHERE id = $id");

    header('location: index.php?msg=deleted');
    return;
}

// update obat
if(isset($_POST['update'])){
    $id    = trim(htmlspecialchars($_POST['id']));
    $nama_obat    = trim(htmlspecialchars($_POST['nama_obat']));
    $kemasan      = trim(htmlspecialchars($_POST['kemasan']));
    $harga        = trim(htmlspecialchars($_POST['harga']));

    mysqli_query($koneksi, "UPDATE obat SET nama_obat = '$nama_obat', kemasan = '$kemasan', harga = '$harga' WHERE id = $id");
    
    header('location: index.php?msg=updated');
        return;

}


?>