<?php 
include '../koneksi.php';
$no_surat = $_POST['Nomor_Suratkeluar'];
$tanggal = $_POST['tanggal'];
$perihal = $_POST['perihal'];
$kepada = $_POST['kepada'];
$catatan = $_POST['catatan'];
$kategori = $_POST['kategori'];


mysqli_query($koneksi, "insert into surat_keluar values (NULL,'$no_surat', '$tanggal', '$perihal', '$kepada', '$catatan', '$kategori')") or die(mysqli_error($koneksi));
header("location:surat_keluar.php?alert=berhasil");

// mysqli_query($koneksi, "insert into master_pengeluaran values (NULL, '$sumberdana','$divisi','$jenis','$tanggal','$bulan','$rincian','$jumlah')")or die(mysqli_error($koneksi));
// header("location:pengeluaran.php?alert=berhasil");

