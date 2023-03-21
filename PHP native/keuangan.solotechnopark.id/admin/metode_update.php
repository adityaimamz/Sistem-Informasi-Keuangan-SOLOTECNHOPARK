<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$jenis  = $_POST['jenis'];

mysqli_query($koneksi, "update metode_bayar set Jenis='$jenis' where Id_metode='$id'") or die(mysqli_error($koneksi));
header("location:metode.php?alert=berhasilupdate");