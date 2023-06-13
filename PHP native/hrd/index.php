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

<!-- DATA SURAT MASUK -->
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-green">
    <div class="inner">
      <?php 
      $tanggal = date('Y-m-d');
      $suratmasuk = mysqli_query($koneksi,"SELECT count(Id_Suratmasuk) as total_suratmasukhari FROM surat_masuk WHERE Tanggal='$tanggal'");
      $p = mysqli_fetch_assoc($suratmasuk);
      ?>
      <h4 style="font-weight: bolder">
        <?php 
       echo $p['total_suratmasukhari']
        ?>
      </h4>
      <p>Karyawan Pendidikan SMA</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_masuk_tgl.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-green">
    <div class="inner">
      <?php
      $bulan = date('m');
      $suratmasuk = mysqli_query($koneksi,"SELECT count(Id_Suratmasuk) as total_suratmasukbulan FROM surat_masuk WHERE month(Tanggal)='$bulan'");
      $p = mysqli_fetch_assoc($suratmasuk);
      ?>
      <h4 style="font-weight: bolder">
        <?php 
          echo $p['total_suratmasukbulan']
        ?>
      </h4>
      <p>Karyawan Pendidikan Perguruan Tinggi</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_masuk_bulan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-green">
    <div class="inner">
      <?php 
      $tahun = date('Y');
      $suratmasuk = mysqli_query($koneksi,"SELECT count(Id_Suratmasuk) as total_suratmasuktahun FROM surat_masuk WHERE year(Tanggal)='$tahun'");
      $p = mysqli_fetch_assoc($suratmasuk);
      ?>
      <h4 style="font-weight: bolder">
        <?php 
          echo $p['total_suratmasuktahun']
        ?>
      </h4>
      <p>Karyawan Masa Kerja 0-2 Tahun</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_masuk_tahun.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-green">
    <div class="inner">
      <?php 
      $suratmasuk = mysqli_query($koneksi,"SELECT count(Id_Suratmasuk) as total_suratmasuk FROM surat_masuk");
      $p = mysqli_fetch_assoc($suratmasuk);
      ?>
      <h4 style="font-weight: bolder">
        <?php 
       echo $p['total_suratmasuk']
        ?>
      </h4>
      <p>Karyawan Masa Kerja 2-5 Tahun</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_masuk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<!-- DATA SURAT KELUAR -->
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <?php 
      $tanggal = date('Y-m-d');
      $suratkeluar = mysqli_query($koneksi,"SELECT count(Id_Suratkeluar) as total_suratkeluarhari FROM surat_keluar WHERE Tanggal='$tanggal'");
      $p = mysqli_fetch_assoc($suratkeluar);
      ?>
      
      <h4 style="font-weight: bolder">
      <?php 
       echo $p['total_suratkeluarhari']
        ?>
      </h4>
      <p>Karyawan Masa Kerja 5-10 Tahun</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_keluar_tgl.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <?php 
      $bulan = date('m');
      $suratkeluar = mysqli_query($koneksi,"SELECT count(Id_Suratkeluar) as total_suratkeluarbulan FROM surat_keluar WHERE month(Tanggal)='$bulan'");
      $p = mysqli_fetch_assoc($suratkeluar);
      ?>
      
      <h4 style="font-weight: bolder">
      <?php 
       echo $p['total_suratkeluarbulan']
        ?>
      </h4>
      <p>Karyawan Masa Kerja 10 tahun keatas</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_keluar_bulan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <?php 
      $tahun = date('Y');
      $suratkeluar = mysqli_query($koneksi,"SELECT count(Id_Suratkeluar) as total_suratkeluartahun FROM surat_keluar WHERE year(Tanggal)='$tahun'");
      $p = mysqli_fetch_assoc($suratkeluar);
      ?>
      
      <h4 style="font-weight: bolder">
      <?php 
       echo $p['total_suratkeluartahun']
        ?>
      </h4>
      <p>Karyawan cluster nilai 0-25</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_keluar_tahun.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red">
    <div class="inner">
      <?php 
      $suratkeluar = mysqli_query($koneksi,"SELECT count(Id_Suratkeluar) as total_suratkeluar FROM surat_keluar");
      $p = mysqli_fetch_assoc($suratkeluar);
      ?>
      <h4 style="font-weight: bolder">
      <?php 
       echo $p['total_suratkeluar']
        ?>
      </h4>
      <p>Karyawan cluster nilai 25-50</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="surat_keluar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
              <h4 class="text-center">Nilai Rata-rata karyawan per bulan</h4>
                <?php 
                  $suratmasuk= mysqli_query($koneksi,"SELECT count(Id_Suratmasuk) as total_suratmasuk FROM surat_masuk");
                  $suratkeluar= mysqli_query($koneksi,"SELECT count(Id_Suratkeluar) as total_suratkeluar FROM surat_keluar");
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
<?php include 'footer.php'; ?>