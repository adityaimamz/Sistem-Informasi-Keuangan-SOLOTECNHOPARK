<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT master_penerimaan.Kode_penerimaan, master_penerimaan.Tanggal, master_penerimaan.Bulan, master_penerimaan.Nama_pembayar, master_penerimaan.Alamat_instansi, master_penerimaan.Besaran_biaya, master_penerimaan.Keperluan,master_penerimaan.Bukti, master_penerimaan.Status, master_penerimaan.Drive FROM master_penerimaan WHERE master_penerimaan.Status='voice' order by Id_penerimaan desc");
// header kolom pada file CSV
$csv_header = array("KODE PENERIMAAN","TANGGAL", "BULAN", "NAMA","ASAL INSTANSI", "BESARAN","KEPERLUAN", "GAMBAR/BUKTI","STATUS","LINK DRIVE","KETERANGAN");

// membuka file CSV untuk ditulis
$fp = fopen('data_tagihan.csv', 'w');

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
header('Content-Disposition: attachment; filename="data_tagihan.csv"');
readfile('data_tagihan.csv');
exit;
?>