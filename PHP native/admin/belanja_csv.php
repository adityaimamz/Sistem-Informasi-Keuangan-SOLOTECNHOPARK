<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT * FROM master_belanja order by Id_jenisbelanja desc");
// header kolom pada file CSV
$csv_header = array("ID","JENIS SUMBER BELANJA");

// membuka file CSV untuk ditulis
$fp = fopen('data_sumberbelanja.csv', 'w');

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
header('Content-Disposition: attachment; filename="data_sumberbelanja.csv"');
readfile('data_sumberbelanja.csv');
exit;
?>	