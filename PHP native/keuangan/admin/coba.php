<!DOCTYPE html>
<html>
<head>
	<title>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS - www.malasngoding.com</title>
	<script type="text/javascript" src="../chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
	body{
		font-family: roboto;
	}
 
	table{
		margin: 0px auto;
	}
	</style>
 
 
	<center>
		<h2>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS<br/>- www.malasngoding.com -</h2>
	</center>
 
 
	<?php 
	include '../koneksi.php';
	?>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart"></canvas>
	</div>
 
	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart2"></canvas>
	</div>
	<br/>
	<br/>
 
	<table border="1">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$data = mysqli_query($koneksi,"SELECT SUM(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Id_divisi='$id_divisi'");
			while($d=mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $d['Nama_divisi']; ?></td>
					<td><?php echo $d['total']; ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: [
					<?php 
      $divisi = mysqli_query($koneksi,"SELECT master_divisi.Nama_divisi, SUM(master_pengeluaran.Jumlah) AS total FROM master_divisi JOIN master_pengeluaran ON master_pengeluaran.Id_divisi=master_divisi.Id_divisi GROUP BY master_pengeluaran.Id_divisi");
      while($d = mysqli_fetch_array($divisi)){
        ?>
        "<?php echo $d['Nama_divisi']; ?>",
        <?php 
      }
      ?>
				],
				datasets: [{
					label: '',
					data: [
<<<<<<< HEAD
						<?php
      $divisi = mysqli_query($koneksi, "SELECT DISTINCT Id_divisi FROM master_pengeluaran ORDER BY Id_divisi ASC");
      while($d = mysqli_fetch_array($divisi)){
        $id_divisi = $d['Id_divisi'];
        $pengeluaran = mysqli_query($koneksi, "SELECT SUM(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Id_divisi='$id_divisi'");
        $total = mysqli_fetch_assoc($pengeluaran)['total_pengeluaran'];
        if(empty($total)){
          echo "0,";
        } else {
          echo $total.",";
        }
          }
        ?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				
			}
		});

		var ctx = document.getElementById("myChart2").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Cash","transfer"],
				datasets: [{
					label: '',
					data: [
						<?php
     $id_metode = mysqli_query($koneksi,"SELECT distinct id_metode from master_penerimaan order by id_metode asc");
     while($t = mysqli_fetch_array($id_metode)){
       $metode = $t['id_metode'];
       $pengeluaran = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_pengeluaran from master_penerimaan where id_metode='$metode'");
       $pem = mysqli_fetch_assoc($pengeluaran);
       $total = $pem['total_pengeluaran'];
       if($pem['total_pengeluaran'] == ""){
         echo "0,";
       }else{
         echo $total.",";
       }
     }
      ?>
=======
					<?php 
					$jumlah_administrasi = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='12'");
					echo number_format(mysqli_fetch_array($jumlah_administrasi)[0]);
					?>, 
					<?php 
					$jumlah_akuntansi = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='4'");
					echo number_format(mysqli_fetch_array($jumlah_akuntansi)[000000]);
					?>, 
					<?php 
					$jumlah_anggaran = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='3'");
					echo number_format(mysqli_fetch_array($jumlah_anggaran)[000000]);
					?>, 
					<?php 
					$jumlah_diklat = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='6'");
					echo number_format(mysqli_fetch_array($jumlah_diklat)[000000]);
					?>,
					<?php 
					$jumlah_kh = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='11'");
					echo number_format(mysqli_fetch_array($jumlah_kh)[000000]);
					?>,
					<?php 
					$jumlah_logistik = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='2'");
					echo number_format(mysqli_fetch_array($jumlah_logistik)[000000]);
					?>,
					<?php 
					$jumlah_pk = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='10'");
					echo number_format(mysqli_fetch_array($jumlah_pk)[000000]);
					?>,
					<?php 
					$jumlah_pa = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='5'");
					echo number_format(mysqli_fetch_array($jumlah_pa)[000000]);
					?>,
					<?php 
					$jumlah_PrPm = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='7'");
					echo number_format(mysqli_fetch_array($jumlah_PrPm)[000000]);
					?>,
					<?php 
					$jumlah_Ri = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='8'");
					echo number_format(mysqli_fetch_array($jumlah_Ri)[000000]);
					?>,
					<?php 
					$jumlah_SFHKI = mysqli_query($koneksi,"SELECT sum(Jumlah) from master_pengeluaran where Id_divisi='9'");
					echo number_format(mysqli_fetch_array($jumlah_SFHKI)[000000]);
					?>
>>>>>>> 92471ad0979c7f934ca2cb5898fa58b3d3d26ddd
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(255, 99, 132, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(255,99,132,1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>
