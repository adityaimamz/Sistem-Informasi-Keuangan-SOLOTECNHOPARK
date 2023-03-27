<?php 
include '../koneksi.php';
$jenis  = $_POST['jenis'];

mysqli_query($koneksi, "insert into master_belanja values (NULL, '$jenis')")or die(mysqli_error($koneksi));
header("location:belanja.php?alert=berhasil");