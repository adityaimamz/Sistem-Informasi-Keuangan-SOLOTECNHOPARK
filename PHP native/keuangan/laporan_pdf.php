<?php
require_once '../vendor/autoload.php'; // memuat file autoload.php dari Dompdf
use Dompdf\Dompdf; // memanggil namespace Dompdf
?>

 <!DOCTYPE html>
 <html>
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Pengeluaran UPTD Kawasan Sains Dan Teknologi Solo Technopark</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
<style>
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 12pt;
        text-align: center;
        font-family : arial;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 12pt;
        font-family : arial;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
</head>
<body>

  <style type="text/css">
   
  </style>

  <center>
 		<h4>LAPORAN PENGELUARAN</h4>
 		<h4>Transaksi Pengeluaran Online UPTD Kawasan Sains Dan Teknologi Solo Technopark</h4>
    <h6>Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126</h6>
 	</center>

  <?php 
  include '../koneksi.php';
  // error_reporting(0);
  error_reporting(E_ALL ^ E_DEPRECATED);
 	if(isset($_GET['tanggal_akhir']) && isset($_GET['tanggal_awal']) && isset($_GET['divisi']) && isset($_GET['sumberdana'])){
 		$tgl1= $_GET['tanggal_awal'];
 		$tgl2 = $_GET['tanggal_akhir'];
 		$divisi = $_GET['divisi'];
        $dana=$_GET['sumberdana'];
 	?>

    <table>
      <tr>
        <th>DARI TANGGAL</th>
        <th>:</th>
        <td><?php echo date('d-m-Y',strtotime($tgl1)); ?></td>
      </tr>
      <tr>
        <th>SAMPAI TANGGAL</th>
        <th>:</th>
        <td><?php echo date('d-m-Y',strtotime($tgl2)); ?></td>
      </tr>
    </table>

    <br/>

    <table class="table">
      <tr>
        <th>NO</th>
        <th class="text-center">KODE</th>
        <th class="text-center">TANGGAL</th>
        <th class="text-center">JENIS</th>
        <th class="text-center">DIVISI</th>
        <th class="text-center">RINCIAN</th>
        <th class="text-center">JUMLAH</th>
      </tr>
      <?php 
      
      $no=1;
      $total_pengeluaran=0;
      if($divisi == "semuadivisi" && $dana == "semuadana"){
          $data = "SELECT * FROM master_pengeluaran,master_divisi,master_sumberdana where master_divisi.Id_divisi = master_pengeluaran.Id_divisi and master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2' and master_pengeluaran.Keterangan='verifikasi'";
      }elseif($divisi == "semuadivisi" && $dana != "semuadana"){
          $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_sumberdana = '$dana' AND master_pengeluaran.Keterangan='verifikasi'";
      }elseif($dana == "semuadana" && $divisi != "semuadivisi"){
          $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi='$divisi' AND master_pengeluaran.Keterangan='verifikasi'";
      }else{
          $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi = '$divisi' AND master_pengeluaran.Id_sumberdana = '$dana' and master_pengeluaran.Keterangan='verifikasi'";
      }
      $result = mysqli_query($koneksi, $data);
      //memeriksa apakah ada data yang ditemukan
      if (mysqli_num_rows($result) > 0) { 

        while($d = mysqli_fetch_array($result)){
        $total_pengeluaran += $d['Jumlah'];

        ?>
      <tr>
        <td class="text-center"><?php echo $no++; ?></td>
        <td><?php echo $d['Kode_pengeluaran']; ?></td>
        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
        <td><?php echo $d['Jenis']; ?></td>
        <td><?php echo $d['Nama_divisi']; ?></td>
        <td><?php echo $d['Rincian']; ?></td>
        <td class="text-center">
          <?php 
          if($d['Jumlah'] != NULL){
            echo "Rp. ".number_format($d['Jumlah'])." ,-";
          }else{
            echo "-";
          }
          ?>
        </td>
      </tr>
        <?php 
          }
      }else{ // if num rows ?> 
          <div class="alert alert-danger text-center">
          Data Kosong
          </div>
      <?php
      }
      ?>
      <tr>
        <th colspan="6" class="text-right">TOTAL</th>
        <td class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total_pengeluaran)." ,-"; ?></td>
      </tr>
    </table>

    <?php 
  }else{
    ?>

    <div class="alert alert-info text-center">
      Silahkan Filter Laporan Terlebih Dulu.
    </div>

    <?php
  }
  ?>

  <?php 
  // require_once("../library/dompdf/dompdf_config.inc.php");
  $dompdf = new Dompdf();
  $dompdf->load_html(ob_get_clean());
  $dompdf->set_paper("A4", 'landscape');
  $dompdf->render();
  $dompdf->stream("Laporan.pdf");    
  ?>

</body>
</html>
