<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from surat_keluar where Id_Suratkeluar='$id'");
header("location:surat_keluar.php");