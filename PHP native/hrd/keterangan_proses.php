<?php 
include '../koneksi.php';
$keterangan  = $_POST['keterangan'];

mysqli_query($koneksi, "insert into master_keterangan values (NULL, '$keterangan')")or die(mysqli_error($koneksi));
header("location:keterangan.php?alert=berhasil");