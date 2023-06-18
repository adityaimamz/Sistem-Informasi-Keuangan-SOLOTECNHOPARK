<?php 
include '../koneksi.php';
$karyawan = $_POST['karyawan'];
$username = $_POST['username'];
$password = md5($_POST['password']);

$data = mysqli_query($koneksi,"SELECT * FROM karyawan WHERE karyawan.Id_karyawan='$karyawan' ");
$k = mysqli_fetch_array($data);
$nama=$k['Nama'];

mysqli_query($koneksi, "insert into master_user values ('NULL','$nama','','$username','$password','Karyawan','$karyawan')")or die(mysqli_error($koneksi));
header("location:akun/user.php?alert=berhasil");