<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_barang where Id_barang='$id'");
header("location:barang.php");