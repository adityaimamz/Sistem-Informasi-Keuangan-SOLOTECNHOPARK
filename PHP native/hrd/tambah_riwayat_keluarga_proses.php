<?php
include '../koneksi.php';

$karyawan = $_POST['karyawan'];
$namaAyah = $_POST['namayah'];
$tempatLahirAyah = $_POST['tempatlahirayah'];
$tanggalLahirAyah = $_POST['tgllahirayah'];
$namaIbu = $_POST['namaibu'];
$tempatLahirIbu = $_POST['tempatlahiribu'];
$tanggalLahirIbu = $_POST['tgllahiribu'];
$namaPasangan = $_POST['namapasangan'];
$tempatLahirPasangan = $_POST['tempatlahirpasangan'];
$tanggalLahirPasangan = $_POST['tgllahirpasangan'];
$namaMertua = $_POST['namamertua'];
$tempatLahirMertua = $_POST['tempatlahirmertua'];
$tanggalLahirMertua = $_POST['tgllahirmertua'];
$namaAnak1 = $_POST['namaanak1'];
$tempatLahirAnak1 = $_POST['tempatlahiranak1'];
$tanggalLahirAnak1 = $_POST['tgllahiranak1'];
$namaAnak2 = $_POST['namaanak2'];
$tempatLahirAnak2 = $_POST['tempatlahiranak2'];
$tanggalLahirAnak2 = $_POST['tgllahiranak2'];
$namaAnak3 = $_POST['namaanak3'];
$tempatLahirAnak3 = $_POST['tempatlahiranak3'];
$tanggalLahirAnak3 = $_POST['tgllahiranak3'];
$namaAnak4 = $_POST['namaanak4'];
$tempatLahirAnak4 = $_POST['tempatlahiranak4'];
$tanggalLahirAnak4 = $_POST['tgllahiranak4'];
$namaAnak5 = $_POST['namaanak5'];
$tempatLahirAnak5 = $_POST['tempatlahiranak5'];
$tanggalLahirAnak5 = $_POST['tgllahiranak5'];

mysqli_query($koneksi, "INSERT INTO riwayat_keluarga values ('NULL', '$namaAyah', '$tempatLahirAyah', '$tanggalLahirAyah', '$namaIbu', '$tempatLahirIbu', '$tanggalLahirIbu', '$namaPasangan', '$tempatLahirPasangan', '$tanggalLahirPasangan', '$namaMertua', '$tempatLahirMertua', '$tanggalLahirMertua', '$namaAnak1', '$tempatLahirAnak1', '$tanggalLahirAnak1', '$namaAnak2', '$tempatLahirAnak2', '$tanggalLahirAnak2', '$namaAnak3', '$tempatLahirAnak3', '$tanggalLahirAnak3', '$namaAnak4', '$tempatLahirAnak4', '$tanggalLahirAnak4', '$namaAnak5', '$tempatLahirAnak5', '$tanggalLahirAnak5')")or die(mysqli_error($koneksi));
header("location:tambah_karyawan_akun.php?alert=berhasil");