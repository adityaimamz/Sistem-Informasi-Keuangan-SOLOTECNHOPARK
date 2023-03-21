<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT master_barang.Tanggal, master_barang.Kode_barang, master_barang.Nama_barang,master_divisi.Nama_divisi, master_barang.Lokasi, master_barang.Gambar FROM master_divisi JOIN master_barang ON master_divisi.Id_divisi=master_barang.Id_divisi order by Id_barang desc");
// header kolom pada file CSV
$csv_header = array("TANGGAL","KODE BARANG", "NAMA BARANG", "DIVISI","LOKASI","GAMBAR/BUKTI");

// membuka file CSV untuk ditulis
$fp = fopen('data_barang.csv', 'w');

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
header('Content-Disposition: attachment; filename="data_barang.csv"');
readfile('data_barang.csv');
exit;
?>