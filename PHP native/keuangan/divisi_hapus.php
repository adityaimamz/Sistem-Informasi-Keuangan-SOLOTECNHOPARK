<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_divisi where Id_divisi='$id'");
header("location:divisi.php");