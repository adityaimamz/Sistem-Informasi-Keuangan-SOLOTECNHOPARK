<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT * FROM master_divisi order by Id_divisi desc");
// header kolom pada file CSV
$csv_header = array("ID","NAMA DIVISI");

// membuka file CSV untuk ditulis
$fp = fopen('data_divisi.csv', 'w');

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
header('Content-Disposition: attachment; filename="data_divisi.csv"');
readfile('data_divisi.csv');
exit;
?>