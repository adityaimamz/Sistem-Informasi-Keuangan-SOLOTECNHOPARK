<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from surat_masuk where Id_Suratmasuk='$id'");
header("location:surat_masuk.php?");