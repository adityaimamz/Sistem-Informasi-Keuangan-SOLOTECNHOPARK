<?php 
include '../../koneksi.php';
$id  = $_GET['id'];
$idk  = $_GET['idk'];
$bulan  = $_GET['bulan'];

mysqli_query($koneksi, "delete from penilaian where Id_penilaian='$id'");
header("Location: atur_penilai.php?id=" . urlencode($idk) . "&bulan=" . urlencode($bulan));