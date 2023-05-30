<?php
session_start();
require_once("../koneksi.php");
require('../FPDF/fpdf.php');
date_default_timezone_set('Asia/Jakarta');

$tgl1 = $_POST['tanggal_awal'];
$tgl2 = $_POST['tanggal_akhir'];

$data = "SELECT * FROM surat_keluar WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2'";
$result = mysqli_query($koneksi, $data);

if (mysqli_num_rows($result) > 0) {
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();

    $pdf->Image('../assets/dist/img/logo surakarta.png', 20, 5, 15);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(280, 9, 'Laporan Data Surat Keluar', 0, 0, 'C');
    $pdf->Ln(6);
    $pdf->Cell(280, 9, 'Data Surat Keluar UPTD Kawasan Sains Dan Teknologi Solo Technopark', 0, 0, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Ln(6);
    $pdf->Cell(280, 9, 'Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126', 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Image('../assets/dist/img/logo stp-01.png', 255, 5, 40);
    $pdf->Cell(280, 0.1, '', 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Ln(20);
    $Y_Fields_Name_position = 27;

    $pdf->SetFillColor(210, 221, 242);

    $pdf->SetY($Y_Fields_Name_position);
    $pdf->Ln(10);
    $waktu = date("d-m-Y H:i:s");

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

    // $pdf->SetX(10);
    $pdf->Cell(10, 8, 'NO', 1, 0, 'C', 1);
    $pdf->Cell(40, 8, 'Nomor Surat', 1, 0, 'C', 1);
    $pdf->Cell(25, 8, 'Tanggal', 1, 0, 'C', 1);
    $pdf->Cell(100, 8, 'Perihal', 1, 0, 'C', 1);
    $pdf->Cell(48, 8, 'Kepada', 1, 0, 'C', 1);
    $pdf->Cell(25, 8, 'Catatan', 1, 0, 'C', 1);
    $pdf->Cell(30, 8, 'Kategori', 1, 0, 'C', 1);
    $pdf->Ln(8);
    $pdf->SetFont('Arial', '', 10);

    $no = 1;
    $total="0";

    
while($row=mysqli_fetch_array($result)){
  $cellWidth=100; //lebar sel
  $cellHeight=10; //tinggi sel satu baris normal

  //periksa apakah teksnya melibihi kolom?
  if($pdf->GetStringWidth($row['Perihal']) < $cellWidth){
    //jika tidak, maka tidak melakukan apa-apa
    $line=1;
  }else{
    //jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
    //dengan memisahkan teks agar sesuai dengan lebar sel
    //lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
    
    $textLength=strlen($row['Perihal']);	//total panjang teks
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
        $tmpString=substr($row['Perihal'],$startChar,$maxChar);
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
  }//penutp else

  //tulis selnya
  $pdf->SetFillColor(255,255,255);
  $pdf->Cell(10,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
  $pdf->Cell(40,($line * $cellHeight),$row['Nomor_Suratkeluar'],1,0); //sesuaikan ketinggian dengan jumlah garis
  $pdf->Cell(25,($line * $cellHeight),date('d-m-Y', strtotime($row['Tanggal'])),1,0); //sesuaikan ketinggian dengan jumlah garis
  
  //memanfaatkan MultiCell sebagai ganti Cell
  //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
  //ingat posisi x dan y sebelum menulis MultiCell
  $xPos=$pdf->GetX();
  $yPos=$pdf->GetY();
  $pdf->MultiCell($cellWidth,$cellHeight,$row['Perihal'],1);

  //kembalikan posisi untuk sel berikutnya di samping MultiCell 
    //dan offset x dengan lebar MultiCell
  $pdf->SetXY($xPos + $cellWidth , $yPos);

  $pdf->Cell(48,($line * $cellHeight),$row['Kepada'],1,0); //sesuaikan ketinggian dengan jumlah garis
  $pdf->Cell(25,($line * $cellHeight),$row['Catatan'],1,0); //sesuaikan ketinggian dengan jumlah garis
  $pdf->Cell(30,($line * $cellHeight),$row['Kategori'],1,0); //sesuaikan ketinggian dengan jumlah garis
}


    $pdf->Output();
} else {
    $pdf = new FPDF('L', 'mm', 'A4');
    $pdf->AddPage();

    $pdf->Image('../assets/dist/img/logo surakarta.png', 20, 5, 15);
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(280, 9, 'Laporan Data Surat Keluar',0, 0, 'C');
    $pdf->Ln(6);
    $pdf->Cell(280, 9, 'Data Surat Keluar UPTD Kawasan Sains Dan Teknologi Solo Technopark', 0, 0, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Ln(6);
    $pdf->Cell(280, 9, 'Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126', 0, 0, 'C');
    $pdf->Ln(10);
    $pdf->Image('../assets/dist/img/logo stp-01.png', 255, 5, 40);
    $pdf->Cell(280, 0.1, '', 1, 1, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Ln(20);
    $Y_Fields_Name_position = 27;

    $pdf->SetFillColor(250, 161, 0);

    $pdf->SetY($Y_Fields_Name_position);
    $pdf->Ln(10);
    $pdf->SetX(50);
    $pdf->Cell(200, 8, 'Mohon maaf !!! Data yang anda inginkan tidak ditemukan', 0, 0, 'C', 1);
    $pdf->Output();
}
?>


