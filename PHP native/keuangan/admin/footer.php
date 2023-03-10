  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Build & developed by MSIB batch 4 intern 2023</strong> - Sistem Informasi Laporan Keuangan Solo Technopark
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
<script src="../assets/bower_components/chart.js/Chart.min.js"></script>

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
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "buttons": ["copy", "excel", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  $(document).ready(function(){

   // $(".edit").hide();

   $('#table-datatable').DataTable({
    'paging'      : true,
    'lengthChange': false,
    'searching'   : true,
    'ordering'    : false,
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

  var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
  
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
          echo "Rp. " . number_format($total, 0, ',', '.') . ",-";
          echo ",";
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
    labels : ["A&K","Akntan","Aggrn","Diklat","KH","Lgstk","PK","PA","Pr&Pm","R&I","SFHKI"],
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


  console.log(barChartData);


  window.onload = function(){
    var ctx = document.getElementById("grafik1").getContext("2d");
    window.myBar = new Chart(ctx).Bar(barChartData, {
     responsive : true,
     animation: true,
     barValueSpacing : 5,
     barDatasetSpacing : 1,
     tooltipFillColor: "rgba(0,0,0,0.8)",
     multiTooltipTemplate: "<%= datasetLabel %> - Rp.<%= value.toLocaleString() %>,-"
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