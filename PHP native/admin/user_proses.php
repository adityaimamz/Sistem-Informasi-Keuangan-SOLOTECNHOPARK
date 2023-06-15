<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$alamat  = $_POST['alamat'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

mysqli_query($koneksi, "insert into master_user values (NULL,'$nama', '$alamat', '$username','$password', '$level','')");
header("location:user.php");