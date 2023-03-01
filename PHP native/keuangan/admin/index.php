<?php include 'header.php'; ?>


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard GO
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE Tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'])." ,-" 
              ?>
            </h4>
            <p>penerimaan Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="penerimaan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $bulan = date('m');
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE month(Tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'])." ,-" 
              ?>
            </h4>
            <p>penerimaan Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="penerimaan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE year(Tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'])." ,-" 
              ?>
            </h4>
            <p>penerimaan Tahun Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="penerimaan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
            <?php 
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'])." ,-" 
              ?>
            </h4>
            <p>Seluruh Penerimaan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="penerimaan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" 
              ?>
            </h4>
            <p>Pengeluaran Hari Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="pengeluaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $bulan = date('m');
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE month(Tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" 
              ?>
            </h4>
            <p>Pengeluaran Bulan Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="pengeluaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE year(Tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" 
              ?>
            </h4>
            <p>Pengeluaran Tahun Ini</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="pengeluaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-black">
          <div class="inner">
            <?php 
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'])." ,-" 
              ?>
            </h4>
            <p>Seluruh Pengeluaran</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="pengeluaran.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>








    <!-- /.row -->
    <!-- Main row -->
    <div class="row">

      <!-- Left col -->
      <section class="col-lg-8">

        <div class="nav-tabs-custom">

          <ul class="nav nav-tabs pull-right">
            <!-- <li><a href="#tab2" data-toggle="tab">Pemasukan</a></li> -->
            <li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Realisasi Penerimaan UPT KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
              <canvas id="grafik1" style="position: relative; height: 300px;"></canvas>

              <br/>
              <?php
              include('../koneksi.php');
              $label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
               
              for($bulan = 1;$bulan < 13;$bulan++)
              {
                $thn_ini = date('Y');
                $query = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) AS total_penerimaan FROM master_penerimaan WHERE Bulan='$bulan' AND year(Tanggal)='$thn_ini'");
                $row = $query->fetch_array();
                $jumlah[] = $row['total_penerimaan'];
              }
              ?>
              <!DOCTYPE html>
              <html>
              <head>
                <title>Membuat Grafik Menggunakan Chart JS</title>
                <script type="text/javascript" src="Chart.js"></script>
              </head>
              <body>
                <div style="width: 800px;height: 800px">
                  <canvas id="myChart"></canvas>
                </div>

              <!-- <h4 class="text-center">Grafik Penerimaan Tahun 2023 berdasarkan Metode Bayar</h4>
              <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

              <br/>

              <h4 class="text-center">Realisasi Pengeluaran/Belanja UPT KST SOLO TECHNOPARK Per Divisi <b>Tahun</b> 2023 </h4>
              <canvas id="grafik3" style="position: relative; height: 300px;"></canvas>

              <br/>

              <h4 class="text-center">Progress Realisasi Pengeluaran/Belanja UPT KST SOLO TECHNOPARK Per <b>Bulan</b> Tahun 2023 </h4>
              <canvas id="grafik4" style="position: relative; height: 300px;"></canvas>

            </div> -->

          </div>

        </div>

      </section>
      <!-- /.Left col -->


      <section class="col-lg-4">


        <!-- Calendar -->
        <div class="box box-solid bg-green-gradient">
          <div class="box-header">
            <i class="fa fa-calendar"></i>
            <h3 class="box-title">Kalender</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body no-padding">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
          </div>
          <!-- /.box-body -->
        </div>

      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->

  </section>

</div>

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


  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($label); ?>,
      datasets: [{
        label: 'Grafik Penjualan',
        data: <?php echo json_encode($jumlah); ?>,
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