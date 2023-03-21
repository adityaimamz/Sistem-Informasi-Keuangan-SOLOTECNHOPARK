<?php
session_start();
require_once("../koneksi.php");
require('../FPDF/fpdf.php');
date_default_timezone_set('Asia/Jakarta');

$tgl1=$_POST['tanggal_awal'];
$tgl2=$_POST['tanggal_akhir'];
$metode=$_POST['metode'];

// $querydata = "SELECT metode_bayar.Jenis, master_penerimaan.* FROM master_penerimaan JOIN metode_bayar ON metode_bayar.Id_metode = master_penerimaan.Id_metode WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_penerimaan.Id_metode = '$metode'";
if($metode == "semua"){
  $data = "SELECT * FROM master_penerimaan,metode_bayar where metode_bayar.Id_metode = master_penerimaan.Id_metode and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2'";
}else{
  $data = "SELECT metode_bayar.Jenis, master_penerimaan.* FROM master_penerimaan JOIN metode_bayar ON metode_bayar.Id_metode = master_penerimaan.Id_metode WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_penerimaan.Id_metode = '$metode'";
}
$result = mysqli_query($koneksi, $data);

//memeriksa apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
//menampilkan tabel data

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->Image('../assets/dist/img/logo stp-01.png',20,2,50);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(280,9,'Laporan Data Penerimaan',0,0,'C');
$pdf->Ln(6);
$pdf->Cell(280,9,'Transaksi Penerimaan Online UPTD Solo Technopark',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(6);
$pdf->Cell(280,9,'Sekretariat : Jl. Ki Hajar Dewantara No.19, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126',0,0,'C');
$pdf->Ln(10);
$pdf->Cell(280,0.1,'',1,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(20);
$Y_Fields_Name_position = 27;

$pdf->SetFillColor(210,221,242);

$pdf->SetY($Y_Fields_Name_position);
$pdf->Ln(10);
$waktu=date("d-m-Y H:i:s");

$pdf->SetX(10);
$pdf->Cell(100, 8, 'Dari Tanggal', 0, 0, 'L', 0);
$pdf->SetX(40);
$pdf->Cell(100, 8, ':', 0, 0, 'L', 0);
$pdf->SetX(50);
$pdf->Cell(155, 8, $tgl1, 0, 0, 'L', 0);
$pdf->SetX(220);
$pdf->Cell(100, 8, 'Sampai Tanggal', 0, 0, 'L', 0);
$pdf->SetX(250);
$pdf->Cell(190, 8, ':', 0, 0, 'L', 0);
$pdf->SetX(255);
$pdf->Cell(155, 8, $tgl2, 0, 0, 'L', 0);
$pdf->Ln(5);
$pdf->SetX(10);
$pdf->Cell(100, 8, 'Nama Pegawai', 0, 0, 'L', 0);
$pdf->SetX(40);
$pdf->Cell(50, 8, ':', 0, 0, 'L', 0);
$pdf->SetX(50);
$pdf->Cell(105, 8, $_SESSION['nama'], 0, 0, 'L', 0);
$pdf->SetX(220);
$pdf->Cell(50, 8, 'Waktu Cetak', 0, 0, 'L', 0);
$pdf->SetX(250);
$pdf->Cell(50, 8, ':', 0, 0, 'L', 0);
$pdf->SetX(255);
$pdf->Cell(105, 8, $waktu, 0, 0, 'L', 0);
$pdf->Ln(10);

$pdf->SetX(10);
$pdf->Cell(8,8,'No',1,0,'C',1);
$pdf->SetX(18);
$pdf->Cell(40,8,'METODE BAYAR',1,0,'C',1);
$pdf->SetX(58);
$pdf->Cell(25,8,'TANGGAL',1,0,'C',1);
$pdf->SetX(83);
$pdf->Cell(167,8,'KEPERLUAN',1,0,'C',1);
$pdf->SetX(250);
$pdf->Cell(40,8,'BESARAN BIAYA',1,0,'C',1);
// $pdf->SetX(173);
// $pdf->Cell(27,8,'Biaya Admin',1,0,'C',1);
$pdf->Ln(8);
$pdf->SetFont('Arial','',10);
$no=1;
$total="0";
while ($row = mysqli_fetch_assoc($result)) {
$total=$total+$row['Besaran_biaya'];

$tanggal=$row['Tanggal'];
$tgl=substr($tanggal,8,2);
$bln=substr($tanggal,5,2);
$thn=substr($tanggal,0,4);
if  ($bln=="01"){
  $fixtgl=$tgl." Januari ".$thn;
}elseif ($bln=="02") {
  $fixtgl=$tgl." Februari ".$thn;
}elseif ($bln=="03") {
  $fixtgl=$tgl." Maret ".$thn;
}elseif ($bln=="04") {
  $fixtgl=$tgl." April ".$thn;
}elseif ($bln=="05") {
  $fixtgl=$tgl." Mei ".$thn;
}elseif ($bln=="06") {
  $fixtgl=$tgl." Juni ".$thn;
}elseif ($bln=="07") {
  $fixtgl=$tgl." Juli ".$thn;
}elseif ($bln=="08") {
  $fixtgl=$tgl." Agustus ".$thn;
}elseif ($bln=="09") {
  $fixtgl=$tgl." September ".$thn;
}elseif ($bln=="10") {
  $fixtgl=$tgl." Oktober ".$thn;
}elseif ($bln=="11") {
  $fixtgl=$tgl." Nopember ".$thn;
}elseif ($bln=="12") {
  $fixtgl=$tgl." Desember ".$thn;
}else{
  $fixtgl=$tgl." ".$bln." ".$thn;
}

$pdf->SetX(10);
$pdf->Cell(8,8,$no.".",1,0,'C',0);
$pdf->SetX(18);
$pdf->Cell(40,8,$row['Jenis'],1,0,'L',0);
$pdf->SetX(58);
$pdf->Cell(25,8,$row['Tanggal'],1,0,'C',0);
$pdf->SetX(83);
$pdf->Cell(167,8,$row['Keperluan'],1,0,'L',0);
$pdf->SetX(250);
$pdf->Cell(40,8, "Rp. ".number_format($row["Besaran_biaya"])." ,-",1,0,'R',0);
// $pdf->SetX(173);
// $pdf->Cell(27,8,$biayaadmin,1,0,'R',0);
$pdf->Ln(8);
$no++;
}

$pdf->SetFont('Arial','B',10);
$pdf->SetX(10);
$pdf->Cell(240,8,'TOTAL',1,0,'R',1);
$pdf->SetX(250);
$pdf->Cell(40,8,"Rp. ".number_format($total)." ,-",1,0,'R',1);
// $pdf->SetX(173);
// $pdf->Cell(27,8,$admin1,1,0,'R',0);
// $pdf->Ln(8);
// $pdf->SetX(10);
// $pdf->Cell(128,8,'Total Setor',1,0,'R',0);
// $pdf->SetX(138);
// $pdf->Cell(62,8,$totalsetor1,1,0,'C',0);


$pdf->Output();
//"data_siswa".".pdf",'D'
}else{
  $pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->Image('../assets/dist/img/logo stp-01.png',20,2,50);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(280,9,'Laporan Data Penerimaan',0,0,'C');
$pdf->Ln(6);
$pdf->Cell(280,9,'Transaksi Penerimaan Online UPTD Solo Technopark',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(6);
$pdf->Cell(280,9,'Sekretariat : Jl. Ki Hajar Dewantara No.19, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126',0,0,'C');
$pdf->Ln(10);
$pdf->Cell(280,0.1,'',1,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(20);
$Y_Fields_Name_position = 27;

$pdf->SetFillColor(250,161,0);

$pdf->SetY($Y_Fields_Name_position);
$pdf->Ln(10);
$pdf->SetX(50);
$pdf->Cell(200,8,'Mohon maaf !!! Data yang anda inginkan tidak di temukan',0,0,'C',1);
$pdf->Output();
}
?>