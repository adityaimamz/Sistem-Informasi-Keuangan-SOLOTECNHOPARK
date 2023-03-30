<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT master_penerimaan.No_tandaterima, master_penerimaan.Tanggal, master_penerimaan.Bulan, metode_bayar.Jenis, master_penerimaan.Nama_pembayar, master_penerimaan.Alamat_instansi, master_penerimaan.Besaran_biaya, master_penerimaan.Keperluan,master_penerimaan.Bukti, master_penerimaan.Status, master_penerimaan.Drive,master_penerimaan.Status, master_penerimaan.Keterangan FROM master_penerimaan JOIN metode_bayar ON master_penerimaan.Id_metode=metode_bayar.Id_metode WHERE master_penerimaan.Status='voice' order by Id_penerimaan desc");
// header kolom pada file CSV
$csv_header = array("NO","NO TANDA TERIMA","TANGGAL", "BULAN","METODE BAYAR", "NAMA","ASAL INSTANSI", "BESARAN","KEPERLUAN", "GAMBAR/BUKTI","LINK DRIVE","STATUS","KETERANGAN");

// membuka file CSV untuk ditulis
$fp = fopen('data_penerimaan.csv', 'w');

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
header('Content-Disposition: attachment; filename="data_penerimaan.csv"');
readfile('data_penerimaan.csv');
exit;
?>