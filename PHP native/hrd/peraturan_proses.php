<?php 
include '../koneksi.php';
$peraturan  = $_POST['peraturan'];

mysqli_query($koneksi, "insert into master_jenis_peraturan values (NULL, '$peraturan')")or die(mysqli_error($koneksi));
header("location:peraturan.php?alert=berhasil");