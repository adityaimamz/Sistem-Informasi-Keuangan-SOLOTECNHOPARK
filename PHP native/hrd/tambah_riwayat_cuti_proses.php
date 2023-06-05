<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$tanggal = $_POST['tanggal'];
$jenis = $_POST['jenis'];
$keperluan = $_POST['keperluan'];
$tglmulai = $_POST['tglmulai'];
$tglselesai = $_POST['tglselesai'];

mysqli_query($koneksi, "insert into riwayat_cuti values ('NULL','$tanggal','$jenis','$keperluan','$tglmulai','$tglselesai','$karyawan')")or die(mysqli_error($koneksi));
header("location:tambah_karyawan_keluarga.php?alert=berhasil");