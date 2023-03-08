<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT master_penerimaan.Kode_penerimaan, master_penerimaan.Tanggal, master_penerimaan.Bulan, master_penerimaan.No_tandaterima, metode_bayar.Jenis, master_penerimaan.Nama_pembayar, master_penerimaan.Alamat_instansi, master_penerimaan.Besaran_biaya, master_penerimaan.Keperluan,master_penerimaan.Bukti, master_penerimaan.Status FROM master_penerimaan JOIN metode_bayar ON master_penerimaan.Id_metode=metode_bayar.Id_metode WHERE master_penerimaan.Status='invoice' order by Id_penerimaan desc");
// header kolom pada file CSV
$csv_header = array("KODE PENERIMAAN","TANGGAL", "BULAN","NO TANDA TERIMA","METODE BAYAR", "NAMA","ASAL INSTANSI", "BESARAN","KEPERLUAN", "GAMBAR/BUKTI","STATUS");

// membuka file CSV untuk ditulis
$fp = fopen('data_penerimaan.csv', 'w');

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
header('Content-Disposition: attachment; filename="data_penerimaan.csv"');
readfile('data_penerimaan.csv');
exit;
?>