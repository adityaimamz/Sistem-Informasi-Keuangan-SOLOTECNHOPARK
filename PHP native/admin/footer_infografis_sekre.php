  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.5
    </div>
    <strong>Build & developed by MSIB batch 3 intern 2023</strong> - Solo Techno Park Analyzer (Soto Panaz)
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
      "buttons": ["excel", "print", "colvis"]
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

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels : ["Januari","","Februari","","Maret","","April","","Mei","","Juni","","Juli","","Agustus","","September","","Oktober","","November","","Desember"],
        datasets: [{
            label: '',
            data: [
				<?php while ($p = mysqli_fetch_array($januari)) { echo '"' . $p['januari_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($februari)) { echo '"' . $p['februari_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($maret)) { echo '"' . $p['maret_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($april)) { echo '"' . $p['april_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($mei)) { echo '"' . $p['mei_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($juni)) { echo '"' . $p['juni_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($juli)) { echo '"' . $p['juli_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($agustus)) { echo '"' . $p['agustus_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($september)) { echo '"' . $p['september_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($oktober)) { echo '"' . $p['oktober_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($november)) { echo '"' . $p['november_smasuk'] . '",';}?>,
				<?php while ($p = mysqli_fetch_array($desember)) { echo '"' . $p['desember_smasuk'] . '",';}?>,
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
                        return value.toLocaleString('id-ID', { minimumFractionDigits: 0 });
                    }
                }
            }]
        }
    }
});

var ctx = document.getElementById("myChart1").getContext('2d');
var myChart = new Chart(ctx, {
	type: 'bar',
	data: {
		labels : ["Januari","","Februari","","Maret","","April","","Mei","","Juni","","Juli","","Agustus","","September","","Oktober","","November","","Desember"],
		datasets: [{
			label: '',
			data: [
				<?php while ($a = mysqli_fetch_array($jan)) { echo '"' . $a['januari_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($feb)) { echo '"' . $a['februari_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($mart)) { echo '"' . $a['maret_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($apr)) { echo '"' . $a['april_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($mi)) { echo '"' . $a['mei_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($jun)) { echo '"' . $a['juni_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($jul)) { echo '"' . $a['juli_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($agust)) { echo '"' . $a['agustus_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($sept)) { echo '"' . $a['september_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($okt)) { echo '"' . $a['oktober_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($nov)) { echo '"' . $a['november_keluar'] . '",';}?>,
				<?php while ($a = mysqli_fetch_array($des)) { echo '"' . $a['desember_keluar'] . '",';}?>,
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
						return value.toLocaleString('id-ID', { minimumFractionDigits: 0 });
					}
				}
			}]
		}
	}
});
</script>
</body>
</html>