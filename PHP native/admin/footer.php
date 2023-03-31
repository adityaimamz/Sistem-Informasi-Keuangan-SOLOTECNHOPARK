  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.9
    </div>
    <strong>Build & developed by MSIB batch 3 intern 2023</strong> - Solo Techno Park Finance Analyzer (Soto Panaz)
  </footer>

  
</div>



<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>

<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script src="../assets/dist/js/Chart.js"></script>
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../assets/bower_components/raphael/raphael.min.js"></script>
<script src="../assets/bower_components/morris.js/morris.min.js"></script>

<script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>


<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>

<script src="../assets/bower_components/moment/min/moment.min.js"></script>
<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>

<script src="../assets/dist/js/adminlte.min.js"></script>

<script src="../assets/dist/js/pages/dashboard.js"></script>

<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="../chartjs/Chart.js"></script>

<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "excel", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>

<script>
  $(document).ready(function(){

   // $(".edit").hide();

   $('#table-datatable').DataTable({
    'paging'      : true,
    'lengthChange': true,
    'searching'   : true,
    'ordering'    : true,
    'info'        : true,
    'autoWidth'   : true,
    "pageLength": 50
  });



 });
  
  $('#datepicker').datepicker({
    autoclose: true,
    format: 'dd/mm/yyyy',
  }).datepicker("setDate", new Date());

  $('.datepicker2').datepicker({
    autoclose: true,
    format: 'yyyy/mm/dd',
  });


</script>


<script>

// var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

// var barChartData = {
//   labels : ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],
//   datasets: [
//     {
//     //   label: "American Express",
// 	  backgroundColor: "lightblue",
//       borderColor: "blue",
//       borderWidth: 1,
//       data: [
		
// 		while ($row = mysqli_fetch_array($februari)) {
// 			echo $row['total_februari'];
// 		},
		// echo Mysqli_fetch_array($februari);
// 	  ]
// 		  SELECT SUM(besaran_biaya) AS total_penerimaan FROM master_penerimaan WHERE Keterangan='Verifikasi' GROUP BY MONTH(Tanggal), YEAR(Tanggal), Status='Voice']
//     }
//   ]
// };

// var chartOptions = {
//   responsive: true,
//   legend: {
//     position: "top"
//   },
//   title: {
//     display: true,
//     // text: "Chart.js Bar Chart"
//   },
//   scales: {
//     yAxes: [{
//       ticks: {
//         // beginAtZegunakan fungsi callback untuk mengubah format uang
// 		callback: function(value, index, values) {
// 			return 'Rp ' + value.toLocaleString('id-ID', { minimumFractionDigits: 0 });
// 		}ro:true
// 		// 
//       }
//     }]
//   }
// }

//   var ctx = document.getElementById("myChart").getContext("2d");
//   window.myBar = new Chart(ctx, {
//     type: "bar",
//     data: barChartData,
//     options: chartOptions
//   });

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels : ["Januari","","Februari","","Maret","","April","","Mei","","Juni","","Juli","","Agustus","","September","","Oktober","","November","","Desember"],
        datasets: [{
            label: '',
            data: [
				<?php while ($p = mysqli_fetch_array($januari)) { echo '"' . $p['total_januari'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($februari)) { echo '"' . $p['total_februari'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($maret)) { echo '"' . $p['total_maret'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($april)) { echo '"' . $p['total_april'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($mei)) { echo '"' . $p['total_mei'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($juni)) { echo '"' . $p['total_juni'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($juli)) { echo '"' . $p['total_juli'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($agustus)) { echo '"' . $p['total_agustus'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($september)) { echo '"' . $p['total_september'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($oktober)) { echo '"' . $p['total_oktober'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($november)) { echo '"' . $p['total_november'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($desember)) { echo '"' . $p['total_desember'] . '",';}?>,
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
					$pengeluaran = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_pengeluaran from master_penerimaan where id_metode='$metode' AND Keterangan='Verifikasi' AND Status='Voice'");
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
					$pengeluaran = mysqli_query($koneksi, "SELECT SUM(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Id_divisi='$id_divisi' AND Keterangan='verifikasi' ");
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
		labels : ["Januari","","Februari","","Maret","","April","","Mei","","Juni","","Juli","","Agustus","","September","","Oktober","","November","","Desember"],
		datasets: [{
			label: '',
			data: [
				<?php while ($a = mysqli_fetch_array($jan)) { echo '"' . $a['total_jan'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($feb)) { echo '"' . $a['total_feb'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($mart)) { echo '"' . $a['total_mart'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($apr)) { echo '"' . $a['total_apr'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($mi)) { echo '"' . $a['total_mi'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($jun)) { echo '"' . $a['total_jun'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($jul)) { echo '"' . $a['total_jul'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($agust)) { echo '"' . $a['total_agust'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($sept)) { echo '"' . $a['total_sept'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($okt)) { echo '"' . $a['total_okt'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($nov)) { echo '"' . $a['total_nov'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($des)) { echo '"' . $a['total_des'] . '",';}?>,
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
</script>
</body>
</html>