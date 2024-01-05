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
    $tgl      = $_POST['tgl'];
    $idpasien = $_POST['id'];
    $dokter   = $_POST['dokter'];
    $diagnosa = trim(htmlspecialchars($_POST['diagnosa'])); 
    $obat     = trim(htmlspecialchars($_POST['obat']));   

    mysqli_query($koneksi, "INSERT INTO rekamedis VALUES ('$no_rm', '$tgl', '$idpasien', '$dokter', '$diagnosa', '$obat')");
    
    header('location: tambah-data.php?msg=added');
        return;

}

// hapus data
if(@$_GET['aksi'] == 'hapus-data'){
    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM rekamedis WHERE no_rm = '$id'");

    header('location: index.php?msg=deleted');
    return;
}

// update data
if(isset($_POST['update'])){
    $no_rm    = $_POST['no_rm'];
    $tgl      = $_POST['tgl'];
    $idpasien = $_POST['id'];
    $dokter   = $_POST['dokter'];
    $diagnosa = trim(htmlspecialchars($_POST['diagnosa'])); 
    $obat     = trim(htmlspecialchars($_POST['obat']));   

    mysqli_query($koneksi, "UPDATE rekamedis SET 
                            tgl_rm    = '$tgl',
                            id_pasien = '$idpasien', 
                            id_dokter = '$dokter',
                            diagnosa  = '$diagnosa',
                            obat      = '$obat'
                            WHERE no_rm = '$no_rm'
                            ");
    
    header('location: index.php?msg=updated');
        return;

}


?>