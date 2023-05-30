<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];

mysqli_query($koneksi, "insert into master_divisi values (NULL, '$nama')")or die(mysqli_error($koneksi));
header("location:divisi.php?alert=berhasil");