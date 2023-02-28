<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$divisi  = $_POST['divisi'];
$jenis  = $_POST['jenis'];
$rincian  = $_POST['rincian'];
$jumlah  = $_POST['jumlah'];
$sumberdana  = $_POST['sumberdana'];

mysqli_query($koneksi, "update master_pengeluaran set Id_sumberdana='$sumberdana', Id_divisi='$divisi', Jenis_belanja='$jenis', Tanggal='$tanggal', Bulan='$bulan', Rincian='$rincian', jumlah='$jumlah' where Id_pengeluaran='$id'") or die(mysqli_error($koneksi));
header("location:pengeluaran.php?alert=berhasilupdate");
