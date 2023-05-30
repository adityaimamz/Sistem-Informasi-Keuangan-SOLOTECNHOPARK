<?php 
include '../koneksi.php';
$jenis  = $_POST['jenis'];

mysqli_query($koneksi, "insert into metode_bayar values (NULL, '$jenis')")or die(mysqli_error($koneksi));
header("location:metode.php?alert=berhasil");