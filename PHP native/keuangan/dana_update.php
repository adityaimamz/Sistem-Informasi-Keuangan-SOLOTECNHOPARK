<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$jenis  = $_POST['jenis'];

mysqli_query($koneksi, "update master_sumberdana set Jenis='$jenis' where Id_sumberdana='$id'") or die(mysqli_error($koneksi));
header("location:dana.php?alert=berhasilupdate");