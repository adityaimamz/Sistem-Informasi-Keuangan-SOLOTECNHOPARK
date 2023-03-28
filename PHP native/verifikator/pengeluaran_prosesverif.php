<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "UPDATE master_pengeluaran SET Keterangan='verifikasi' where Id_pengeluaran='$id'") or die(mysqli_error($koneksi));
header("location:pengeluaran_verifikasi.php?alert=berhasilupdate");