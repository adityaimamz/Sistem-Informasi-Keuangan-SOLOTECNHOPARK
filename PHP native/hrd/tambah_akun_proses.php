<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = md5($_POST['password']);

mysqli_query($koneksi, "insert into master_user values ('NULL','$nama','','$username','$password','Karyawan','$karyawan')")or die(mysqli_error($koneksi));
header("location:database_karyawan.php?alert=berhasil");