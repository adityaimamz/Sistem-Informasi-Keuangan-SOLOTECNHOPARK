<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "UPDATE master_penerimaan SET Keterangan='verifikasi' where Id_penerimaan='$id'") or die(mysqli_error($koneksi));
header("location:penerimaan_verifikasi.php?alert=berhasilupdate");