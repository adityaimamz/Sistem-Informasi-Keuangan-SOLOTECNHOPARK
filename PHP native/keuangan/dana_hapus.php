<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_sumberdana where Id_sumberdana='$id'");
header("location:dana.php");