<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$tmt = $_POST['tmt'];
$jabatan = $_POST['jabatan'];
$unit = $_POST['unit'];

mysqli_query($koneksi, "insert into riwayat_jabatan values ('NULL','$tmt','$jabatan','$unit','$karyawan')")or die(mysqli_error($koneksi));
header("location:tambah_karyawan.php?alert=berhasil");