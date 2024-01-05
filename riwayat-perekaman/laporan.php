<?php

session_start();

if(!isset($_SESSION['ssLoginRM'])){
  header('location: ../auth/login.php');
  exit();
}

require "../config.php";

$title = "Laporan Poliklinik - Poliklinik";

// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require '../vendor/autoload.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

$id = $_GET['id'];

$queryPasien = mysqli_query($koneksi, "SELECT * FROM pasien");
$pasien = mysqli_fetch_assoc($queryPasien);

$content='
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .head{
        text-align: center;
        margin-bottom: 40px;
        margin-top: -5px;
    }   
    .label-head{
        width: 120px;
        padding-left: 1px;
        padding-bottom: 5px;
        text-align: left;
    } 
    .data-left{
        width: 300px;
        padding-left: 1px;
        padding-bottom: 5px;
        text-align: left;
    } 
    .data-right{
        width: 130px;
        padding-left: 1px;
        padding-bottom: 5px;
        text-align: left;
    }  
    hr{
        margin-bottom: 2px;
        margin-left: -5px;
        width: 700px;
    }  
    </style>
</head>
<body>
    <h1 class="head">Rekam Medis Pasien</h1>

    <table>
        <tr>
            <th class="label-head">Nama Pasien</th>
            <td class="data-left">: '. $pasien['nama'] .'</td>
            <th class="label-head">Alamat</th>
            <td class="data-right">: '. $pasien['alamat'] .'</td>
        </tr>
        <tr>
            <th class="label-head">No KTP</th>
            <td class="data-left">: '. $pasien['nm_ktp'] .'</td>
            <th class="label-head">No HP</th>
            <td class="data-right">: '. $pasien['no_hp'] .'</td>
        </tr>
        <tr>
            <th class="label-head">No RM</th>
            <td class="data-left" colspan="3">: '. $pasien['no_rm'] .'</td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th colspan="5">
                    <hr size="3">
                </th>
            </tr>
            <tr>
                <th style="width: 150px;">Tanggal</th>
                <th style="width: 150px;">Diagnosa</th>
                <th style="width: 150px;">Obat</th>
                <th style="width: 150px;">Dokter</th>
            </tr>
            <tr>
                <th colspan="5">
                    <hr size="3">
                </th>
            </tr>
        </thead>
    </table>
</body>
</html>';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('Laporan Poliklinik', array('Attachment' => false));

?>