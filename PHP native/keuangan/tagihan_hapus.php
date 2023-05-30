<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_penerimaan where Id_penerimaan='$id'");
header("location:tagihan.php");