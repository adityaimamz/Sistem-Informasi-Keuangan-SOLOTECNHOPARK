<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from karyawan where Id_karyawan='$id'");
header("location:database_karyawan.php");