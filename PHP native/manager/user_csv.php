<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT * FROM master_user order by Id_user desc");
// header kolom pada file CSV
$csv_header = array("ID","NAMA USER", "ALAMAT","USERNAME", "PASSWORD", "LEVEL");

// membuka file CSV untuk ditulis
$fp = fopen('data_user.csv', 'w');

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
header('Content-Disposition: attachment; filename="data_user.csv"');
readfile('data_user.csv');
exit;
?>