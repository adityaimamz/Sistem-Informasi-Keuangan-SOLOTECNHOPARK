<?php 
include '../koneksi.php';
$jenis  = $_POST['jenis'];

mysqli_query($koneksi, "insert into master_sumberdana values (NULL, '$jenis')")or die(mysqli_error($koneksi));
header("location:dana.php?alert=berhasil");