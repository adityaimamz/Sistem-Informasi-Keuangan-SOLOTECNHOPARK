<?php
include '../koneksi.php';
$data = mysqli_query($koneksi,"SELECT master_agenda.Tanggal, master_agenda.Pukul, master_agenda.Acara, master_agenda.Instansi, master_agenda.Tempat, master_agenda.Perihal, master_agenda.Status, master_agenda.Jumlah_pengunjung, master_agenda.Keterangan, master_pegawai.Nama_pegawai FROM master_agenda JOIN master_pegawai ON master_pegawai.Id_pegawai=master_agenda.Id_pegawai order by Id_agenda desc");
// header kolom pada file CSV
$csv_header = array("TANGGAL","PUKUL", "ACARA","INSTANSI", "TEMPAT", "PERIHAL","STATUS","JUMLAH PENGUNJUNG","KETERANGAN","PIC");

// membuka file CSV untuk ditulis
$fp = fopen('agenda.csv', 'w');

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
header('Content-Disposition: attachment; filename="agenda.csv"');
readfile('agenda.csv');
exit;
?>