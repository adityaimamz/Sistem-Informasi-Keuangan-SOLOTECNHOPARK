<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from diklat where Id_diklat='$id'");
header("location:diklat.php");