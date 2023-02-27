<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($koneksi, "update master_divisi set Nama_divisi='$nama' where Id_divisi='$id'") or die(mysqli_error($koneksi));
header("location:penerimaan.php?alert=berhasilupdate");