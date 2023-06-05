<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$username = $_POST['username'];
$password = md5($_POST['password']);

mysqli_query($koneksi, "insert into master_user values ('NULL','$karyawan','','$username','$password','Karyawan')")or die(mysqli_error($koneksi));
header("location:tambah_karyawan.php?alert=berhasil");