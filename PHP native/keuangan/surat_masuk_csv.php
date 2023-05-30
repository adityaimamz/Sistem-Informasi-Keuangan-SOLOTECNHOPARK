<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT * FROM surat_masuk order by Id_Suratmasuk desc");
// header kolom pada file CSV
$csv_header = array("NO", "NO SURAT MASUK","NOMOR SURAT", "TANGGAL","PERIHAL", "TERIMA DARI", "ISI","TANGGAL DITERUSKAN","CATATAN","KATEGORI","TANGGAL PELAKSANAAN","WAKTU PELAKSANAAN","TEMPAT PELAKSANAAN");

// membuka file CSV untuk ditulis
$fp = fopen('surat_masuk.csv', 'w');

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
header('Content-Disposition: attachment; filename="surat_masuk.csv"');
readfile('surat_masuk.csv');
exit;
?>