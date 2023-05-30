<?php 
include '../koneksi.php';
$id = $_POST['id'];
$no_surat = $_POST['Nomor_Suratkeluar'];
$tanggal = $_POST['tanggal'];
$perihal = $_POST['perihal'];
$kepada = $_POST['kepada'];
$catatan = $_POST['catatan'];
$kategori = $_POST['kategori'];

mysqli_query($koneksi, "UPDATE surat_keluar SET Nomor_Suratkeluar='$no_surat', Tanggal='$tanggal', Perihal='$perihal', Kepada='$kepada', Catatan='$catatan', Kategori='$kategori' WHERE Id_Suratkeluar='$id'") or die(mysqli_error($koneksi));
header("location:surat_keluar.php?alert=berhasilupdate");
?> 
