<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($koneksi, "update master_pegawai set Nama_pegawai='$nama' where Id_pegawai='$id'") or die(mysqli_error($koneksi));
header("location:pegawai.php?alert=berhasilupdate");