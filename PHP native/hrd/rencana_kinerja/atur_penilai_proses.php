<?php 
include '../../koneksi.php';
$penilai  = $_GET['penilai'];
$dinilai  = $_GET['dinilai'];
$bulan = $_GET['bulan'];
$tahun = date('Y');

mysqli_query($koneksi, "insert into rencana_penilaian values (NULL,'$penilai','$dinilai')");
mysqli_query($koneksi, "insert into penilaian values (NULL,'$dinilai', '', '$bulan','$tahun')");
header("Location: atur_penilai.php?dinilai=" . urlencode($dinilai) . "&bulan=" . urlencode($bulan));