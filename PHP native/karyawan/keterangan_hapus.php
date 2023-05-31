<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_keterangan where Id_keterangan='$id'");
header("location:keterangan.php");