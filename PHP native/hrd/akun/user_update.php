<?php 
include '../../koneksi.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$alamat  = $_POST['alamat'];
$username = $_POST['username'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);
$level = $_POST['level'];

mysqli_query($koneksi, "update master_user set Nama='$nama', Alamat='$alamat', Username='$username', Level='$level' where Id_user='$id'")  or die(mysqli_error($koneksi));
header("location:user.php");