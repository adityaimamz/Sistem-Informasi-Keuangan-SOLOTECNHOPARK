<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$nama = $_POST['nama'];
$tipe = $_POST['tipe'];
$penyelenggara = $_POST['penyelenggara'];
$tanggal = $_POST['tanggal'];

mysqli_query($koneksi, "insert into riwayat_pelatihan values ('NULL','$nama','$tipe','$penyelenggara','$tanggal','$karyawan')")or die(mysqli_error($koneksi));
header("location:tambah_karyawan_hukuman.php?alert=berhasil");