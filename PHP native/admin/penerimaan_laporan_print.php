<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan Penerimaan UPTD Kawasan Sains Dan Teknologi Solo Technopark</title>
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
			<h4>LAPORAN PENERIMAAN</h4>
			<h4 style="margin-top:3px;">Transaksi Penerimaan Online UPTD Kawasan Sains Dan Teknologi Solo Technopark</h4>
			<h5 style="margin-top:2px;">Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126</h5>
		</div>

		<div class="logo-kanan">
			<img src="../assets/dist/img/logo stp-01.png">
		</div>
	</div>

 	<?php 
 	if(isset($_GET['tanggal_akhir']) && isset($_GET['tanggal_awal']) && isset($_GET['metode'])){
 		$tgl1= $_GET['tanggal_awal'];
 		$tgl2 = $_GET['tanggal_akhir'];
 		$metode = $_GET['metode'];

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
                        <th width="10%" rowspan="2" class="text-center">NAMA</th>
 						<th width="10%" rowspan="2" class="text-center">TANGGAL</th>
 						<th rowspan="2" class="text-center">METODE BAYAR</th>
 						<th rowspan="2" class="text-center">KEPERLUAN</th>
 						<th rowspan="2" class="text-center">ASAL INSTANSI</th>
 						<th class="text-center">BESARAN BIAYA</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 					include '../koneksi.php';
 					$no=1;
 					$total_penerimaan=0;
                            if($metode == "semua"){
                        $data = "SELECT * FROM master_penerimaan,metode_bayar where metode_bayar.Id_metode = master_penerimaan.Id_metode and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2' and master_penerimaan.Keterangan='verifikasi' and master_penerimaan.Status='voice' ORDER BY Tanggal ASC";
                      }else{
                        $data = "SELECT metode_bayar.Jenis, master_penerimaan.* FROM master_penerimaan JOIN metode_bayar ON metode_bayar.Id_metode = master_penerimaan.Id_metode WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_penerimaan.Id_metode = '$metode' and master_penerimaan.Keterangan='verifikasi' and master_penerimaan.Status='voice' ORDER BY Tanggal ASC";
                      }
                      $result = mysqli_query($koneksi, $data);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {
                        $total_penerimaan += $row['Besaran_biaya'];
                           //menampilkan tabel data
                          ?>
 						<tr>
 							<td class="text-center"><?php echo $no++; ?></td>
 							<td><?php echo $row['Nama_pembayar']; ?></td>
                            <td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal'])); ?></td>
 							<td><?php echo $row['Jenis']; ?></td>
 							<td><?php echo $row['Keperluan']; ?></td>
 						    <td><?php echo $row['Alamat_instansi']; ?></td>
 							<td class="text-center">
 								<?php 
 								if($row['Besaran_biaya'] != NULL){
 									echo "Rp. ".number_format($row['Besaran_biaya'])." ,-";
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
 						<td class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total_penerimaan)." ,-"; ?></td>
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
