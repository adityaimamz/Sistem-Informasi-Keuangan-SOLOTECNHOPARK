<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$keterangan  = $_POST['keterangan'];

mysqli_query($koneksi, "update master_keterangan set keterangan='$keterangan' where Id_keterangan='$id'") or die(mysqli_error($koneksi));
header("location:keterangan.php?alert=berhasilupdate");