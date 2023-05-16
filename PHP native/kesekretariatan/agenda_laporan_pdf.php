<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan Agenda UPTD Kawasan Sains Dan Teknologi Solo Technopark</title>
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
			<h4>LAPORAN AGENDA</h4>
			<h4 style="margin-top:3px;">Transaksi Agenda Online UPTD Kawasan Sains Dan Teknologi Solo Technopark</h4>
			<h5 style="margin-top:2px;">Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126</h5>
		</div>

		<div class="logo-kanan">
			<img src="../assets/dist/img/logo stp-01.png">
		</div>
	</div>

 	<?php 
 	if(isset($_GET['tanggal_akhir']) && isset($_GET['tanggal_awal']) && isset($_GET['keterangan'])){
 		$tgl1= $_GET['tanggal_awal'];
 		$tgl2 = $_GET['tanggal_akhir'];
 		$keterangan = $_GET['keterangan'];
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
 						<th width="10%" rowspan="2" class="text-center">TANGGAL</th>
 						<th width="10%" rowspan="2" class="text-center">TANGGAL SELESAI</th> 			
                        <th rowspan="2" class="text-center">PUKUL</th>
 						<th rowspan="2" class="text-center">ACARA</th>
 						<th rowspan="2" class="text-center">INSTANSI</th>
 						<th rowspan="2" class="text-center">TEMPAT</th>
 						<th class="text-center">JUMLAH PENGUNJUNG</th>
                         <th rowspan="2" class="text-center">KETERANGAN</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 					include '../koneksi.php';
 					$no=1;
 					$total_Agenda=0;
                     if ($keterangan == "semua") {
                        $data = "SELECT * FROM master_agenda, master_keterangan WHERE master_keterangan.Id_keterangan = master_agenda.Id_keterangan AND date(Tanggal)>='$tgl1' AND date(Tanggal)<='$tgl2' ORDER BY Tanggal ASC";
                      } else {
                        $data = "SELECT master_keterangan.Keterangan, master_agenda.* FROM master_agenda JOIN master_keterangan ON master_keterangan.Id_keterangan = master_agenda.Id_keterangan WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_agenda.Id_keterangan = '$keterangan' ORDER BY Tanggal ASC";
                      }
                      $result = mysqli_query($koneksi, $data);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {

                           //menampilkan tabel data
                          ?>
 						<tr>
 							<td class="text-center"><?php echo $no++; ?></td>
 							<td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal'])); ?></td>
 							<td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal_selesai'])); ?></td> 							
                            <td><?php echo $row['Pukul']; ?></td>
                            <td><?php echo $row['Acara']; ?></td> 
 							<td><?php echo $row['Instansi']; ?></td>
 							<td><?php echo $row['Tempat']; ?></td>
                             <td><?php echo $row['Jumlah_pengunjung']; ?></td> 
 						    <td><?php echo $row['Keterangan']; ?></td>
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
