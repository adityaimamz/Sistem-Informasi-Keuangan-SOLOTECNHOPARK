<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_pengeluaran where Id_pengeluaran='$id'");
header("location:pengeluaran.php");