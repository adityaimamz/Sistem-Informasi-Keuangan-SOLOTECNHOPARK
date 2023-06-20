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
if(isset($_GET['status'])){
	$status = $_GET['status'];
	// Code selanjutnya
  
 	?>

 		<div class="row">
 			<div class="col-lg-6">
 				<table class="table table-bordered">
 					<tr>
						<td colspan="2"></td>
 						<td class="text-right"><?php echo $_SESSION['nama']; ?></td>
						<th>:</th>
						<th class="text-right">NAMA PEGAWAI</th>
 					</tr>
 					<tr>
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
 						<th rowspan="2" class="text-center">TEMPAT LAHIR</th> 	
						 <th rowspan="2" class="text-center">TANGGAL LAHIR</th> 	
						<th rowspan="2" class="text-center">ALAMAT</th> 		
                        <th rowspan="2" class="text-center">JURUSAN</th>
 						<th rowspan="2" class="text-center">KETERANGAN</th>
 						<th rowspan="2" class="text-center">JADWAL PELATIHAN</th>
 						<th rowspan="2" class="text-center">ANGKATAN</th>
 						<th class="text-center">PENYALURAN</th>
                         <th rowspan="2" class="text-center">STATUS</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 					include '../koneksi.php';
 					$no=1;
 					$total_Agenda=0;
					 if ($status == "semua") {
						$data = "SELECT * FROM diklat, master_status WHERE master_status.Id_status = diklat.Id_status ORDER BY Id_diklat ASC";
					  } else {
						$data = "SELECT  master_status.Status, diklat.* FROM diklat LEFT JOIN master_status ON diklat.Id_status=master_status.Id_status WHERE diklat.Id_status = '$status' ORDER BY Id_diklat ASC";
					  }  
                      $result = mysqli_query($koneksi, $data);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {

                           //menampilkan tabel data
                          ?>
 						<tr>
						 <td class="text-center"><?php echo $no++; ?></td>
                            <td><?php echo $row['Nama']; ?></td>
                            <td><?php echo $row['Tempat_lahir']; ?></td>
							<td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal_lahir'])); ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['Jurusan']; ?></td>
                            <td><?php echo $row['Keterangan']; ?></td>
                            <td><?php echo $row['Jadwal_pelatihan']; ?></td>
                            <td><?php echo $row['Angkatan']; ?></td>
                            <td><?php echo $row['Penyaluran']; ?></td>
                            <td><?php echo $row['Status']; ?></td>
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
