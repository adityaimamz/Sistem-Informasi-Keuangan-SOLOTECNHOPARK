<!DOCTYPE html>
<html>
<head>
	<title>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS - www.malasngoding.com</title>

</head>
<body>
 
 
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

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart3"></canvas>
	</div>

	<div style="width: 800px;margin: 0px auto;">
		<canvas id="myChart4"></canvas>
	</div>
	<br/>
	<br/>
 
 
 
	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
						datasets: [{
							label: '',
							data: [
													<?php
						for($bulan=1;$bulan<=12;$bulan++){
							$thn_ini = date('Y');
							$penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) AS total_penerimaan FROM master_penerimaan WHERE month(Tanggal)='$bulan' AND year(Tanggal)='$thn_ini'");
							$pem = mysqli_fetch_assoc($penerimaan);
							
							// $total = str_replace(",", "44", number_format($pem['total_penerimaan']));
							$total = $pem['total_penerimaan'];
							if($pem['total_penerimaan'] == ""){
							echo "0,";
							}else{
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
						scales: {
							yAxes: [{
								ticks: {
									// beginAtZero:true
									// gunakan fungsi callback untuk mengubah format uang
									callback: function(value, index, values) {
										return 'Rp ' + value.toLocaleString('id-ID', { minimumFractionDigits: 0 });
									}
								}
							}]
						}
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
									// beginAtZero:true
									// gunakan fungsi callback untuk mengubah format uang
									callback: function(value, index, values) {
										return 'Rp ' + value.toLocaleString('id-ID', { minimumFractionDigits: 0 });
									}
								}
							}]
						}
					}
				});

		var ctx = document.getElementById("myChart3").getContext('2d');
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

		var ctx = document.getElementById("myChart4").getContext('2d');
				var myChart = new Chart(ctx, {
					type: 'bar',
					data: {
						labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
						datasets: [{
							label: '',
							data: [
								<?php
						for($bulan=1;$bulan<=12;$bulan++){
							$thn_ini = date('Y');
							$penerimaan = mysqli_query($koneksi,"SELECT sum(Jumlah) AS total_penerimaan FROM master_pengeluaran WHERE month(Tanggal)='$bulan' AND year(Tanggal)='$thn_ini'");
							$pem = mysqli_fetch_assoc($penerimaan);
							
							// $total = str_replace(",", "44", number_format($pem['total_penerimaan']));
							$total = $pem['total_penerimaan'];
							if($pem['total_penerimaan'] == ""){
							echo "0,";
							}else{
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
						scales: {
							yAxes: [{
								ticks: {
									// beginAtZero:true
									// gunakan fungsi callback untuk mengubah format uang
									callback: function(value, index, values) {
										return 'Rp ' + value.toLocaleString('id-ID', { minimumFractionDigits: 0 });
									}
								}
							}]
						}
					}
				});

				var barChartData = {
    labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
    datasets : [
    {
      label: 'penerimaan',
      fillColor : "rgba(51, 240, 113, 0.61)",
      strokeColor : "rgba(11, 246, 88, 0.61)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = date('Y');
        $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) AS total_penerimaan FROM master_penerimaan WHERE month(Tanggal)='$bulan' AND year(Tanggal)='$thn_ini'");
        $pem = mysqli_fetch_assoc($penerimaan);
        
        // $total = str_replace(",", "44", number_format($pem['total_penerimaan']));
        $total = $pem['total_penerimaan'];
        if($pem['total_penerimaan'] == ""){
          echo "0,";
        }else{
          echo $total.",";
        }
      }
      ?>
      ]
    }
    ]
  }

  var barChartData2 = {
    labels : ["Cash","transfer"],
    datasets : [
    {
      label: 'pengeluaran',
      fillColor : "rgba(51, 240, 113, 0.61)",
      strokeColor : "rgba(51, 240, 113, 0.61)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
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
      ]
    }
    ]
  }
  
  var barChartData3 = {
    labels : [
      <?php 
      $divisi = mysqli_query($koneksi,"SELECT master_divisi.Nama_divisi, SUM(master_pengeluaran.Jumlah) AS total FROM master_divisi JOIN master_pengeluaran ON master_pengeluaran.Id_divisi=master_divisi.Id_divisi GROUP BY master_pengeluaran.Id_divisi");
      while($d = mysqli_fetch_array($divisi)){
        ?>
        "<?php echo $d['Nama_divisi']; ?>",
        <?php 
      }
      ?>
    ],
    datasets: [
  {
    label: 'Pengeluaran',
    fillColor: "rgba(255, 51, 51, 0.8)",
    strokeColor: "rgba(248, 5, 5, 0.8)",
    highlightFill: "rgba(151,187,205,0.75)",
    highlightStroke: "rgba(254, 29, 29, 0)",
    data: [
      <?php
      $divisi = mysqli_query($koneksi, "SELECT DISTINCT Id_divisi FROM master_pengeluaran");
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
      ]
    }
  ]

  }

  var barChartData4 = {
    labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
    datasets : [
    {
      label: 'pengeluaran',
      fillColor : "rgba(255, 51, 51, 0.8)",
      strokeColor : "rgba(255, 51, 51, 0.8)",
      highlightFill: "rgba(220,220,220,0.75)",
      highlightStroke: "rgba(220,220,220,1)",
      data : [
      <?php
      for($bulan=1;$bulan<=12;$bulan++){
        $thn_ini = date('Y');
        $penerimaan = mysqli_query($koneksi,"SELECT sum(Jumlah) AS total_penerimaan FROM master_pengeluaran WHERE month(Tanggal)='$bulan' AND year(Tanggal)='$thn_ini'");
        $pem = mysqli_fetch_assoc($penerimaan);
        
        // $total = str_replace(",", "44", number_format($pem['total_penerimaan']));
        $total = $pem['total_penerimaan'];
        if($pem['total_penerimaan'] == ""){
          echo "0,";
        }else{
          echo $total.",";
        }
      }
      ?>
      ]
    }
    ]
  }




  window.onload = function(){
    var ctx = document.getElementById("grafik1").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
        responsive : true,
        animation: true,
        barValueSpacing : 5,
        barDatasetSpacing : 1,
        tooltipFillColor: "rgba(0,0,0,0.8)",
        multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-",
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var value = data.datasets[0].data[tooltipItem.index];
                    return 'Rp. ' + value.toLocaleString() + ',-';
                }
            }
        }
    });

   var ctx = document.getElementById("grafik2").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData2, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

   var ctx = document.getElementById("grafik3").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData3, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

    var ctx = document.getElementById("grafik4").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData4, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
   });

  }
	</script>
</body>
</html>