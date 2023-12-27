<?php

date_default_timezone_set('Asia/Jakarta');

$host   = 'localhost';
$user   = 'root';
$pass   = '';
$dbname = 'poliklinik';

$koneksi = mysqli_connect($host, $user, $pass, $dbname);

// if (!$koneksi){
//     die('koneksi gagal');
// } else{
//     echo "koneksi berhasil";
// }

$main_url = "http://localhost/poliklinik/";

function uploadGbr($url){
    $namafile = $_FILES['gambar']['name'];
    $ukuran   = $_FILES['gambar']['size'];
    $tmp      = $_FILES['gambar']['tmp_name'];

    $ekstensiValid = ['jpg','jpeg','png','gif'];
    $ekstensiFile  = explode('.', $namafile);
    $ekstensiFile  = strtolower(end($ekstensiFile));

    if (!in_array($ekstensiFile, $ekstensiValid)){
        echo "<script>
            alert('Input user gagal, file yang anda upload bukan gambar');
            window.location = '$url';
        </script>";
        die();
    }

    if ($ukuran > 1000000) {
        echo "<script>
            alert('Input user gagal, maximal ukuran gambar 1 MB');
            window.location = '$url';
        </script>";
        die();
    }

    $namafileBaru = time() . '-' . $namafile;

    move_uploaded_file($tmp, '../asset/gambar' . $namafileBaru);
    return $namafileBaru;
}

?>