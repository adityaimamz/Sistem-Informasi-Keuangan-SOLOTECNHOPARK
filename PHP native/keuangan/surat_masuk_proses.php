<?php 
include '../koneksi.php';
$no_suratmasuk = $_POST['no_suratmasuk'];
$no_surat = $_POST['nomor_surat'];
$tanggal = $_POST['tanggal'];
$perihal = $_POST['perihal'];
$terima_dari = $_POST['terima_dari'];
$isi = $_POST['isi'];
$tanggal_diteruskan = $_POST['tanggal_diteruskan'];
$catatan = $_POST['catatan'];
$kategori = $_POST['kategori'];
$tgl_pelaksanaan = $_POST['tgl_pelaksanaan'];
$waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
$tempat_pelaksanaan = $_POST['tempat_pelaksanaan'];

mysqli_query($koneksi, "insert into surat_masuk VALUES (NULL, '$no_suratmasuk','$no_surat', '$tanggal', '$perihal', '$terima_dari', '$isi', '$tanggal_diteruskan', '$catatan', '$kategori', '$tgl_pelaksanaan', '$waktu_pelaksanaan', '$tempat_pelaksanaan')") or die(mysqli_error($koneksi));
header("location: surat_masuk.php?alert=berhasil");