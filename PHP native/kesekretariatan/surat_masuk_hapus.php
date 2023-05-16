<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from Surat_masuk where Id_Suratmasuk='$id'");
header("location:surat_masuk.php?");