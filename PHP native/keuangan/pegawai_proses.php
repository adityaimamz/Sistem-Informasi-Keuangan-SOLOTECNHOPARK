<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];

mysqli_query($koneksi, "insert into master_pegawai values (NULL, '$nama')")or die(mysqli_error($koneksi));
header("location:pegawai.php?alert=berhasil");