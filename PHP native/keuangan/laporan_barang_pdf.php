<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title>Laporan Barang UPTD Kawasan Sains Dan Teknologi Solo Technopark</title>
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
			<h4>LAPORAN BARANG</h4>
			<h4 style="margin-top:3px;">Data Barang UPTD Solo Technopark</h4>
			<h5 style="margin-top:2px;">Sekretariat : Jl. Ki Hajar Dewantara, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126</h5>
		</div>

		<div class="logo-kanan">
			<img src="../assets/dist/img/logo stp-01.png">
		</div>
	</div>

 	<?php 
 	if(isset($_GET['tanggal_akhir']) && isset($_GET['tanggal_awal'])){
 		$tgl1= $_GET['tanggal_awal'];
 		$tgl2 = $_GET['tanggal_akhir'];
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
 					  <th>NO</th>
                      <th>TANGGAL MASUK</th>
                      <th>TANGGAL KELUAR</th>
                      <th>NO REGISTRASI</th>
                      <th>NAMA BARANG</th>
                      <th>LOKASI GEDUNG</th>
                      <th>LOKASI RUANGAN</th>
                      <th>MERK</th>
                      <th>LABEL STP</th>
                      <th>LABEL PEMKOT</th>
                      <th>JUMLAH</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 					include '../koneksi.php';
 					$no=1;
 					$data = "SELECT master_barang.* FROM master_barang WHERE Tanggal_masuk BETWEEN '$tgl1' AND '$tgl2' ORDER BY Tanggal_masuk ASC";
                    $result = mysqli_query($koneksi, $data);
                    //memeriksa apakah ada data yang ditemukan
                    if (mysqli_num_rows($result) > 0) { 
 					
                        while($row = mysqli_fetch_array($result)){
                        ?>
 						<tr>
 							<td class="text-center"><?php echo $no++; ?></td>
 							<td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal_masuk'])); ?></td>
 							<td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal_keluar'])); ?></td>
 							<td class="text-center"><?php echo $row['No_registrasi']; ?></td>
 							<td><?php echo $row['Nama_barang']; ?></td>
 							<td><?php echo $row['Nama_gedung']; ?></td>
 							<td><?php echo $row['Nama_ruanganarea']; ?></td>
 							<td><?php echo $row['JenisMerkTipe']; ?></td>
 							<td><?php echo $row['Kode_label_STP']; ?></td>
 							<td><?php echo $row['Kode_label_pemkot']; ?></td>
 							<td><?php echo $row['Jumlah_barang']; ?></td>
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
