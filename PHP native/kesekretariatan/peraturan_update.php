<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($koneksi, "update master_jenis_peraturan set Jenis_peraturan='$nama' where Id_jenisperaturan='$id'") or die(mysqli_error($koneksi));
header("location:peraturan.php?alert=berhasilupdate");