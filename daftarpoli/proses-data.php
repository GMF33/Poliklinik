<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "..//config.php";

// tambah data rekam medis
if(isset($_POST['simpan'])){
    $no_rm    = $_POST['no_rm'];
    $poli     = $_POST['poli'];
    $tgl      = $_POST['tgl'];
    $keluhan   = $_POST['keluhan'];
       

    mysqli_query($koneksi, "INSERT INTO daftar VALUES ('$no_rm', '$poli', '$tgl', '$keluhan')");
    
    header('location: index.php?msg=added');
        return;

}



?>