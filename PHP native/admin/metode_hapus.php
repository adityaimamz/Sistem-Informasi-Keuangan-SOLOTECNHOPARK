<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from metode_bayar where Id_metode='$id'");
header("location:metode.php");