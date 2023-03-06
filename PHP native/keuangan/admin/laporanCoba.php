<?php
//koneksi ke database
include '../koneksi.php';
//membuat objek TCPDF
require_once('tcpdf/tcpdf.php');
$pdf = new TCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);

//membuat halaman baru
$pdf->AddPage();

//judul halaman
$pdf->SetTitle('Data Mahasiswa');

//membuat tabel
$html = '<table border="1">';
$html .= '<tr>';
$html .= '<th>No.</th>';
$html .= '<th>Id_divisi</th>';
$html .= '<th>Nama Divisi</th>';
$html .= '</tr>';

//query data dari database
$query = "SELECT * FROM master_divisi";
$result = mysqli_query($conn, $query);

//looping untuk mengambil data dari query
$i = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $html .= '<tr>';
    $html .= '<td>' . $i . '</td>';
    $html .= '<td>' . $row['Id_divisi'] . '</td>';
    $html .= '<td>' . $row['Nama_divisi'] . '</td>';
    $html .= '</tr>';
    $i++;
}

$html .= '</table>';

//menampilkan tabel dalam file PDF
$pdf->writeHTML($html, true, false, true, false, '');

//menyimpan file PDF
$pdf->Output('data_mahasiswa.pdf', 'D');
?>
