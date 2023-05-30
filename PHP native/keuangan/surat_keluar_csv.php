<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT * FROM surat_keluar order by Id_Suratkeluar desc");
// header kolom pada file CSV
$csv_header = array("NO", "NO SURAT MASUK","NOMOR SURAT", "TANGGAL","PERIHAL", "TERIMA DARI", "ISI");

// membuka file CSV untuk ditulis
$fp = fopen('surat_keluar.csv', 'w');

// menulis header kolom pada file CSV
fputcsv($fp, $csv_header);

// variabel untuk nomor urut
$i = 1;

// menulis data baris demi baris pada file CSV
while($row = mysqli_fetch_assoc($data)) {
    // menambahkan nomor urut pada kolom pertama
    array_unshift($row, $i);

    // menulis baris pada file CSV
    fputcsv($fp, $row);

    // increment nomor urut
    $i++;
}

// menutup file CSV
fclose($fp);

// memberikan respon untuk mengunduh file CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="surat_keluar.csv"');
readfile('surat_keluar.csv');
exit;
?>