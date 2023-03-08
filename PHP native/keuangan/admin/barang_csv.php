<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT master_pengeluaran.Kode_pengeluaran, master_sumberdana.Jenis, master_divisi.Nama_divisi, master_pengeluaran.Bulan, master_pengeluaran.Tanggal, master_pengeluaran.Jenis_belanja,master_pengeluaran.Jumlah, master_pengeluaran.Rincian, master_pengeluaran.Bukti_lpj FROM master_pengeluaran JOIN master_sumberdana ON master_pengeluaran.Id_sumberdana=master_sumberdana.Id_sumberdana JOIN master_divisi ON master_divisi.Id_divisi=master_pengeluaran.Id_divisi order by Id_pengeluaran desc");
// header kolom pada file CSV
$csv_header = array("KODE PENGELUARAN","SUMBER DANA", "DIVISI","BULAN","TANGGAL SPJ", "JENIS BELANJA","JUMLAH", "RINCIAN", "GAMBAR/BUKTI");

// membuka file CSV untuk ditulis
$fp = fopen('data_pengeluaran.csv', 'w');

// menulis header kolom pada file CSV
fputcsv($fp, $csv_header);

// menulis data baris demi baris pada file CSV
while($row = mysqli_fetch_assoc($data)) {
    fputcsv($fp, $row);
}

// menutup file CSV
fclose($fp);

// memberikan respon untuk mengunduh file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data_pengeluaran.csv"');
readfile('data_pengeluaran.csv');
exit;
?>