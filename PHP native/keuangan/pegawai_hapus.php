<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_pegawai where Id_pegawai='$id'");
header("location:pegawai.php");