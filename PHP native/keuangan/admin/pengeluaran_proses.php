<?php 
include '../koneksi.php';
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$divisi  = $_POST['divisi'];
$jenis  = $_POST['jenis'];
$rincian  = $_POST['rincian'];
$jumlah  = $_POST['jumlah'];
$sumberdana  = $_POST['sumberdana'];

mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah')")or die(mysqli_error($koneksi));
header("location:pengeluaran.php?alert=berhasil");