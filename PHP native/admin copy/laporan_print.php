<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan Pengeluaran UPTD Kawasan Sains Dan Teknologi Solo Technopark</title>
 	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<style type="text/css">
    .kop-surat {
      width: 100%;
      height: 120px;
      margin-bottom: 30px;
	  margin-top: 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .kop-surat img {
      height: 100px;
    }

    .kop-surat .logo-kiri {
      margin-left: 30px;
    }

    .kop-surat .logo-kanan {
      margin-right: 30px;
    }

    .judul-laporan {
      text-align: center;
      margin-bottom: 20px;
    }

    .alamat {
      text-align: center;
    }
  </style>
 </head>
 <body>
	<div class="kop-surat">
		<div class="logo-kiri">
			<img src="../assets/dist/img/logo surakarta.png">
		</div>

		<div class="judul-laporan">
			<h4>LAPORAN PENGELUARAN</h4>
			<h4 style="margin-top:3px;">Transaksi Pengeluaran Online UPTD Kawasan Sains Dan Teknologi Solo Technopark</h4>
			<h5 style="margin-top:2px;">Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126</h5>
		</div>

		<div class="logo-kanan">
			<img src="../assets/dist/img/logo stp-01.png">
		</div>
	</div>

 	<?php 
 	if(isset($_GET['tanggal_akhir']) && isset($_GET['tanggal_awal']) && isset($_GET['divisi']) && isset($_GET['sumberdana'])){
 		$tgl1= $_GET['tanggal_awal'];
 		$tgl2 = $_GET['tanggal_akhir'];
 		$divisi = $_GET['divisi'];
        $dana=$_GET['sumberdana'];
 	?>

 		<div class="row">
 			<div class="col-lg-6">
 				<table class="table table-bordered">
 					<tr>
						<th>DARI TANGGAL</th>
						<th>:</th>
						<td><?php echo date('d-m-Y',strtotime($tgl1)); ?></td>
						<td colspan="2"></td>
 						<td class="text-right"><?php echo $_SESSION['nama']; ?></td>
						<th>:</th>
						<th class="text-right">NAMA PEGAWAI</th>
 					</tr>
 					<tr>
 						<th>SAMPAI TANGGAL</th>
 						<th>:</th>
 						<td><?php echo date('d-m-Y',strtotime($tgl2)); ?></td>
						<td colspan="2"></td>
 						<td class="text-right"><?php echo date("d-m-Y H:i:s"); ?></td>
						<th>:</th>
						<th class="text-right">WAKTU CETAK</th>
 					</tr>
 				</table>

  			</div>
 		</div>

 		<div class="table-responsive">
 			<table class="table table-bordered table-striped">
 				<thead>
 					<tr>
 						<th width="1%" rowspan="2">NO</th>
                        <th width="10%" rowspan="2" class="text-center">KODE</th>
 						<th width="10%" rowspan="2" class="text-center">TANGGAL</th>
 						<th rowspan="2" class="text-center">JENIS</th>
 						<th rowspan="2" class="text-center">DIVISI</th>
 						<th rowspan="2" class="text-center">RINCIAN</th>
 						<th class="text-center">JUMLAH</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 					include '../koneksi.php';
 					$no=1;
 					$total_pengeluaran=0;
 					if($divisi == "semuadivisi" && $dana == "semuadana"){
                        $data = "SELECT * FROM master_pengeluaran,master_divisi,master_sumberdana where master_divisi.Id_divisi = master_pengeluaran.Id_divisi and master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2' and master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
                    }elseif($divisi == "semuadivisi" && $dana != "semuadana"){
                        $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_sumberdana = '$dana' AND master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
                    }elseif($dana == "semuadana" && $divisi != "semuadivisi"){
                        $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi='$divisi' AND master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
                    }else{
                        $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi = '$divisi' AND master_pengeluaran.Id_sumberdana = '$dana' and master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
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
 				</tbody>
 			</table>

			<table class="table table-bordered table-striped" style="text-align:center;">
				<tr>
					<td></td>
					<td></td>
					<td style="text-align:right;">Mengetahui,</td>
				</tr>
				<tr>
					<td>Kepala Subbagian Tata Usaha <br>UPTD Kawasan Sains Dan Teknologi</td>
					<td></td>
					<td>Kepala UPTD Kawasan Sains Dan Teknologi</td>
				</tr>
				<tr>
					<td><br><br><br></td>
					<td></td>
					<td><br><br><br></td>
				</tr>
				<tr>
					<td><u>Wahyu Hermawan, S.Si., M.T. </u><br> NIP.19800428 200604 1009</td>
					<td></td>
					<td><u>Rony Widjanarko, SH</u> <br> NIP.19841211 200912 1 002</td>
				</tr>
			</table>
 		</div>

 		<?php 
 	}else{
 		?>

 		<div class="alert alert-info text-center">
 			Silahkan Filter Laporan Terlebih Dulu.
 		</div>

 		<?php
 	}
 	?>


 	<script>

 		window.print();
 		$(document).ready(function(){

 		});
 	</script>

 </body>
 </html>
