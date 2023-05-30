<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$jenis  = $_POST['jenis'];

mysqli_query($koneksi, "update master_belanja set Jenis='$jenis' where Id_jenisbelanja='$id'") or die(mysqli_error($koneksi));
header("location:belanja.php?alert=berhasilupdate");