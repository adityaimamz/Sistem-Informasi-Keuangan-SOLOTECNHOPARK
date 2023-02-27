<?php 
include '../koneksi.php';
$id  = $_POST['id'];
$tanggal  = $_POST['tanggal'];
$bulan  = $_POST['bulan'];
$No_tandaterima  = $_POST['No_tandaterima'];
$metode  = $_POST['metode'];
$nama  = $_POST['nama'];
$alamat  = $_POST['alamat'];
$keperluan  = $_POST['keperluan'];
$nominal  = $_POST['nominal'];

mysqli_query($koneksi, "update master_penerimaan set Bulan='$bulan', Tanggal='$tanggal', Nama_pembayar='$nama', Keperluan='$keperluan', alamat_instansi='$alamat', No_tandaterima='$No_tandaterima', Besaran_biaya='$nominal', Id_metode='$metode' where Id_penerimaan='$id'") or die(mysqli_error($koneksi));
header("location:penerimaan.php?alert=berhasilupdate");

// mysqli_query($koneksi, "update transaksi set transaksi_tanggal='$tanggal', transaksi_jenis='$jenis', transaksi_kategori='$kategori', transaksi_nominal='$nominal', transaksi_keterangan='$keterangan', transaksi_bank='$bank' where transaksi_id='$id'") or die(mysqli_error($koneksi));
// header("location:transaksi.php");