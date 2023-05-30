<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT master_barang.Kode_barang, master_barang.Nama_barang, master_barang.Tanggal_masuk,master_barang.Tanggal_keluar, master_barang.Merk, master_barang.Tipe, master_barang.Jumlah, master_barang.Kondisi_barang, master_barang.Lokasi, master_divisi.Nama_divisi, master_barang.Gambar FROM master_divisi JOIN master_barang ON master_divisi.Id_divisi=master_barang.Id_divisi order by Id_barang desc");
// header kolom pada file CSV
$csv_header = array("NO","KODE BARANG","NAMA BARANG","TANGGAL MASUK","TANGGAL KELUAR","MERK","TIPE","JUMLAH BARANG","KONDISI BARANG","LOKASI", "DIVISI","GAMBAR/BUKTI");

// membuka file CSV untuk ditulis
$fp = fopen('data_barang.csv', 'w');

// variabel untuk nomor urut
$i = 1;

// menulis header kolom pada file CSV
fputcsv($fp, $csv_header);

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
header('Content-Disposition: attachment; filename="data_barang.csv"');
readfile('data_barang.csv');
exit;
?>