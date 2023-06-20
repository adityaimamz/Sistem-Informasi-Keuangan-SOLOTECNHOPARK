<?php 
include 'header.php'; 
date_default_timezone_set('Asia/Jakarta');
$hari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
// array bulan dalam bahasa Indonesia
$namabulan = array(
  1 => "Januari",
  2 => "Februari",
  3 => "Maret",
  4 => "April",
  5 => "Mei",
  6 => "Juni",
  7 => "Juli",
  8 => "Agustus",
  9 => "September",
  10 => "Oktober",
  11 => "November",
  12 => "Desember"
);

$bulan_ini = date('n');
$hari_ini = date('w');
?>


<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Dashboard GO
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">

      <!-- DATA diklat -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $diklat = mysqli_query($koneksi,"SELECT count(Id_diklat) as total_diklat FROM diklat ");
            $p = mysqli_fetch_assoc($diklat);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
             echo $p['total_diklat']
              ?>
            </h4>
            <p>Total Semua Peserta Diklat</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="diklat_tgl.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php
            $bulan = date('m');
            $diklat = mysqli_query($koneksi,"SELECT count(Id_diklat) as total_diklatbekerja FROM diklat LEFT JOIN master_status ON diklat.Id_status=master_status.Id_status WHERE diklat.Id_status = '1'");
            $p = mysqli_fetch_assoc($diklat);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
             echo $p['total_diklatbekerja']
              ?>
            </h4>
            <p>Jumlah Peserta Diklat Sudah Bekerja</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="diklat_bulan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php
            $bulan = date('m');
            $diklat = mysqli_query($koneksi,"SELECT count(Id_diklat) as total_diklatbelumbekerja FROM diklat LEFT JOIN master_status ON diklat.Id_status=master_status.Id_status WHERE diklat.Id_status = '2'");
            $p = mysqli_fetch_assoc($diklat);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
             echo $p['total_diklatbelumbekerja']
              ?>
            </h4>
            <p>Jumlah Peserta Diklat Belum Bekerja</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="diklat_bulan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
    <!--<li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & pengeluaran</a></li>-->
    <li class="pull-left header">Grafik</li>
  </ul>

  <div class="tab-content" style="padding: 20px">
    <div class="chart tab-pane active" id="tab1">
        
      <br>
      <h4 class="text-center">Realisasi Jumlah Peserta Diklat UPTD KST SOLO TECHNOPARK berdasarkan Statis</h4>
        <?php 
          $belumbekerja= mysqli_query($koneksi,"SELECT count(Id_diklat) as total_diklatbelumbekerja FROM diklat LEFT JOIN master_status ON diklat.Id_status=master_status.Id_status WHERE diklat.Id_status = '2'");
          $sudahbekerja= mysqli_query($koneksi,"SELECT count(Id_diklat) as total_diklatbekerja FROM diklat LEFT JOIN master_status ON diklat.Id_status=master_status.Id_status WHERE diklat.Id_status = '1'");
        ?>
      <canvas id="myChart2" style="position: relative; height: 300px;"></canvas>
    </div>
  <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
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
<div id="preloader"></div>
<?php include 'footer_infografis_diklat.php'; ?>