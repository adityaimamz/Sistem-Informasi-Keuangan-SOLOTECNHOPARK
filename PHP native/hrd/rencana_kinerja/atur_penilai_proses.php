<?php 
include '../../koneksi.php';
$penilai  = $_GET['penilai'];
$dinilai  = $_GET['dinilai'];
$bulan = $_GET['bulan'];
$tahun = date('Y');

mysqli_query($koneksi, "insert into penilaian values (NULL,'$dinilai', '$penilai', '$bulan','$tahun','','')");
header("Location: atur_penilai.php?id=" . urlencode($dinilai) . "&bulan=" . urlencode($bulan));