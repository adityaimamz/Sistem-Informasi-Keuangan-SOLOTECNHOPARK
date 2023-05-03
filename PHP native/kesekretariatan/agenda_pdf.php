<?php
session_start();
require_once("../koneksi.php");
require('../FPDF/fpdf.php');
date_default_timezone_set('Asia/Jakarta');

$tgl1=$_POST['tanggal_awal'];
$tgl2=$_POST['tanggal_akhir'];
$divisi=$_POST['divisi'];
$dana=$_POST['sumberdana'];
                        
if($divisi == "semua"){
  $data = "SELECT * FROM master_pengeluaran,master_divisi,master_sumberdana where master_divisi.Id_divisi = master_pengeluaran.Id_divisi and master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2' and master_pengeluaran.Keterangan='verifikasi'";
}else{
  $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi = '$divisi' AND master_pengeluaran.Id_sumberdana = '$dana' and master_pengeluaran.Keterangan='verifikasi'";
}
$result = mysqli_query($koneksi, $data);
//memeriksa apakah ada data yang ditemukan
if (mysqli_num_rows($result) > 0) {
//menampilkan tabel data

$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->Image('../assets/dist/img/logo surakarta.png',20,5,15);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(280,9,'Laporan Data Pengeluaran',0,0,'C');
$pdf->Ln(6);
$pdf->Cell(280,9,'Transaksi Pengeluaran Online UPTD Kawasan Sains Dan Teknologi Solo Technopark',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(6);
$pdf->Cell(280,9,'Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126',0,0,'C');
$pdf->Ln(10);
$pdf->Image('../assets/dist/img/logo stp-01.png',255,5,40);
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
$pdf->Cell(155, 8, date('d-m-Y', strtotime($tgl1)), 0, 0, 'L', 0);
$pdf->SetX(220);
$pdf->Cell(100, 8, 'Sampai Tanggal', 0, 0, 'L', 0);
$pdf->SetX(250);
$pdf->Cell(190, 8, ':', 0, 0, 'L', 0);
$pdf->SetX(255);
$pdf->Cell(155, 8, date('d-m-Y', strtotime($tgl2)), 0, 0, 'L', 0);
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

// $pdf->SetX(10);
$pdf->Cell(40,8,'Kode Pengeluaran',1,0,'C',1);
// $pdf->SetX(102);
$pdf->Cell(25,8,'TANGGAL',1,0,'C',1);
// $pdf->SetX(50);
$pdf->Cell(15,8,'JENIS',1,0,'C',1);
$pdf->Cell(70,8,'NAMA DIVISI',1,0,'C',1);
// $pdf->SetX(127);
$pdf->Cell(85,8,'RINCIAN',1,0,'C',1);
// $pdf->SetX(250);
$pdf->Cell(45,8,'JUMLAH',1,0,'C',1);
// $pdf->SetX(173);
// $pdf->Cell(27,8,'Biaya Admin',1,0,'C',1);
$pdf->Ln(8);
$pdf->SetFont('Arial','',10);
$no=1;
$total="0";

while($row=mysqli_fetch_array($result)){
$cellWidth=85; //lebar sel
$cellHeight=10; //tinggi sel satu baris normal
$total=$total+$row['Jumlah'];

//periksa apakah teksnya melibihi kolom?
if($pdf->GetStringWidth($row['Rincian']) < $cellWidth){
  //jika tidak, maka tidak melakukan apa-apa
  $line=1;
}else{
  //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
  //dengan memisahkan teks agar sesuai dengan lebar sel
  //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
  
  $textLength=strlen($row['Rincian']);	//total panjang teks
  $errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
  $startChar=0;		//posisi awal karakter untuk setiap baris
  $maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
  $textArray=array();	//untuk menampung data untuk setiap baris
  $tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
  
  while($startChar < $textLength){ //perulangan sampai akhir teks
    //perulangan sampai karakter maksimum tercapai
    while( 
    $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
    ($startChar+$maxChar) < $textLength ) {
      $maxChar++;
      $tmpString=substr($row['Rincian'],$startChar,$maxChar);
    }
    //pindahkan ke baris berikutnya
    $startChar=$startChar+$maxChar;
    //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
    array_push($textArray,$tmpString);
    //reset variabel penampung
    $maxChar=0;
    $tmpString='';
    
  }
  //dapatkan jumlah baris
  $line=count($textArray);
}

//tulis selnya
$pdf->SetFillColor(255,255,255);
$pdf->Cell(40,($line * $cellHeight),$row['Kode_pengeluaran'],1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
$pdf->Cell(25,($line * $cellHeight),$row['Tanggal'],1,0); //sesuaikan ketinggian dengan jumlah garis
$pdf->Cell(15,($line * $cellHeight),$row['Jenis'],1,0); //sesuaikan ketinggian dengan jumlah garis
$pdf->Cell(70,($line * $cellHeight),$row['Nama_divisi'],1,0); //sesuaikan ketinggian dengan jumlah garis

//memanfaatkan MultiCell sebagai ganti Cell
//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
//ingat posisi x dan y sebelum menulis MultiCell
$xPos=$pdf->GetX();
$yPos=$pdf->GetY();
$pdf->MultiCell($cellWidth,$cellHeight,$row['Rincian'],1);

//kembalikan posisi untuk sel berikutnya di samping MultiCell 
  //dan offset x dengan lebar MultiCell
$pdf->SetXY($xPos + $cellWidth , $yPos);

  $pdf->Cell(45,($line * $cellHeight),"Rp. ".number_format($row['Jumlah'], 2, '.', ',')." ,-",1,1); //sesuaikan ketinggian dengan jumlah garis
}

$pdf->SetFont('Arial','B',10);
// // $pdf->SetX(10);
$pdf->Cell(235,$cellHeight,'TOTAL',1,0,'R',1);
// // $pdf->SetX(250);
$pdf->Cell(45,$cellHeight,"Rp. ".number_format($total, 2, '.', ',')." ,-",1,0,'L',1);
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

$pdf->Image('../assets/dist/img/logo surakarta.png',20,5,15);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(280,9,'Laporan Data Pengeluaran',0,0,'C');
$pdf->Ln(6);
$pdf->Cell(280,9,'Transaksi Pengeluaran Online UPTD Kawasan Sains Dan Teknologi Solo Technopark',0,0,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Ln(6);
$pdf->Cell(280,9,'Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126',0,0,'C');
$pdf->Ln(10);
$pdf->Image('../assets/dist/img/logo stp-01.png',255,5,40);
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