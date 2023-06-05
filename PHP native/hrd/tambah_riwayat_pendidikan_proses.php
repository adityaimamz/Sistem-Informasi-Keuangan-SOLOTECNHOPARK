<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$tahun = $_POST['tahun'];
$gelar = $_POST['gelar'];
$instansi = $_POST['instansi'];
$jurusan = $_POST['jurusan'];
$tingkat = $_POST['tingkat'];

mysqli_query($koneksi, "insert into riwayat_pendidikan values ('NULL','$tingkat','$jurusan','$instansi','$gelar','$tahun','$karyawan')")or die(mysqli_error($koneksi));
header("location:tambah_karyawan_pelatihan.php?alert=berhasil");