<?php 
include '../../koneksi.php';
$nilai = 0;
$idp = $_POST['idp'];
$id_karyawan = $_POST['id_karyawan'];
$bulan = $_POST['bulan'];
$penilai = $_POST['penilai'];

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
$mean = round(($total / 11),2);

// mysqli_query($koneksi, "update penilaian set Total_nilai='$total', Ratarata_nilai='$mean' where Id_penilaian='$idp'")  or die(mysqli_error($koneksi));
// mysqli_query($koneksi, "INSERT INTO rekap_penilaian VALUES (NULL, '$id_karyawan', '$mean', NULL, NULL)") or die(mysqli_error($koneksi));
// header("Location: skor_penilaian.php?dinilai=" . urlencode($id_karyawan) . "&bulan=" . urlencode($bulan) . "&idp=" . urlencode($idp). "&mean=" . urlencode($mean));

// Cek apakah id_karyawan sudah memiliki nilai dalam tabel rekap_penilaian
// $query = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE Id_karyawan = '$id_karyawan'");
// if (mysqli_num_rows($query) > 0) {
    // Jika sudah ada, lakukan update data rekap_penilaian
    
// } else {
    // Jika belum ada, lakukan insert data rekap_penilaian
    // mysqli_query($koneksi, "INSERT INTO penilaian (NULL, '$id_karyawan', '$mean')") or die(mysqli_error($koneksi));
// }

// mysqli_query($koneksi, "UPDATE penilaian SET Total_nilai = '$total', Ratarata_nilai = '$mean' WHERE Id_penilaian = '$idp'") or die(mysqli_error($koneksi));
mysqli_query($koneksi, "UPDATE penilaian SET Ratarata_nilai = Ratarata_nilai + '$mean' WHERE Id_karyawan = '$id_karyawan'") or die(mysqli_error($koneksi));
mysqli_query($koneksi, "UPDATE rencana_penilaian SET Ket_menilai = 'sudah' WHERE karyawan_penilai = '$penilai'") or die(mysqli_error($koneksi));
header("Location: skor_penilaian.php?dinilai=" . urlencode($id_karyawan) . "&bulan=" . urlencode($bulan) . "&idp=" . urlencode($idp). "&mean=" . urlencode($mean));