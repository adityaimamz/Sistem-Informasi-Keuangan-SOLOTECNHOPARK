<?php 
include '../../koneksi.php';
$idp  = $_GET['idp'];
$dinilai  = $_GET['dinilai'];
$bulan  = $_GET['bulan'];

mysqli_query($koneksi, "delete from rencana_penilaian where Id_rencana='$idp'");
// mysqli_query($koneksi, "delete from penilaian where Id_karyawan='$dinilai' AND Bulan='$bulan' ");
// var_dump($idp);
header("Location: atur_penilai.php?dinilai=" . urlencode($dinilai) . "&bulan=" . urlencode($bulan));