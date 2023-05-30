<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_belanja where Id_jenisbelanja='$id'");
header("location:belanja.php");