<?php 
include '../../koneksi.php';
$penilai  = $_GET['penilai'];
$dinilai  = $_GET['dinilai'];
$bulan = $_GET['bulan'];
$tahun = date('Y');

// Cek apakah id_karyawan sudah memiliki nilai dalam tabel rekap_penilaian
$query = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE Id_karyawan = '$dinilai'");
if (mysqli_num_rows($query) > 0) {
    // Jika sudah ada, lakukan update data rekap_penilaian
    mysqli_query($koneksi, "insert into rencana_penilaian values (NULL,'$penilai','$dinilai','belum')");
} else {
    // Jika belum ada, lakukan insert data rekap_penilaian
    mysqli_query($koneksi, "insert into rencana_penilaian values (NULL,'$penilai','$dinilai','belum')");
    mysqli_query($koneksi, "insert into penilaian values (NULL,'$dinilai', '', '$bulan','$tahun')");
}

header("Location: atur_penilai.php?dinilai=" . urlencode($dinilai) . "&bulan=" . urlencode($bulan));