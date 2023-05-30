<?php 
include '../koneksi.php';
$id  = $_GET['id'];

mysqli_query($koneksi, "delete from master_jenis_peraturan where Id_jenisperaturan='$id'");
header("location:peraturan.php");