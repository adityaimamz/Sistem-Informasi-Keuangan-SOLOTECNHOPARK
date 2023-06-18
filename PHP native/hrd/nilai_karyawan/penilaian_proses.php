<?php 
include '../../koneksi.php';
$nilai = 0;
$idp = $_POST['idp'];
$id_karyawan = $_POST['id_karyawan'];
$bulan = $_POST['bulan'];

// Mengambil nilai dari pergaulan A
$r1 = $_POST['r1'] ?? 0;
$r2 = $_POST['r2'] ?? 0;
$r3 = $_POST['r3'] ?? 0;
$r4 = $_POST['r4'] ?? 0;
$r5 = $_POST['r5'] ?? 0;
$r6 = $_POST['r6'] ?? 0;
$r7 = $_POST['r7'] ?? 0;
$r8 = $_POST['r8'] ?? 0;
$r9 = $_POST['r9'] ?? 0;
$r10 = $_POST['r10'] ?? 0;
$r11 = $_POST['r11'] ?? 0;

$total = $r1 + $r2 + $r3 + $r4 + $r5 + $r6 + $r7 + $r8 + $r9 + $r10 + $r11;
$mean = $total/11;

mysqli_query($koneksi, "update penilaian set Total_nilai='$total', Ratarata_nilai='$mean' where Id_penilaian='$idp'")  or die(mysqli_error($koneksi));
header("Location: skor_penilaian.php?dinilai=" . urlencode($id_karyawan) . "&bulan=" . urlencode($bulan) . "&idp=" . urlencode($idp). "&mean=" . urlencode($mean));