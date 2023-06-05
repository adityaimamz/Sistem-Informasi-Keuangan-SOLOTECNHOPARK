<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$pelanggaran = $_POST['pelanggaran'];
$hukuman = $_POST['hukuman'];
$tingkat = $_POST['tingkat'];
$tanggal = $_POST['tanggal'];

mysqli_query($koneksi, "insert into riwayat_hukuman values ('NULL','$pelanggaran','$hukuman','$tingkat','$tanggal','$karyawan')")or die(mysqli_error($koneksi));
header("location:tambah_karyawan.php?alert=berhasil");