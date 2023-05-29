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
      INFOGRAFIS
      <small>Kesekretariatan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Infografis</li>
    </ol>
  </section>

  <section class="content">

    <div class="row">

      <!--Surat Masuk-->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Surat Masuk Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_masuk_tgl.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Surat Masuk Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_masuk_bulan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Surat Masuk Tahun Ini (<?php echo $tahun;?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_masuk_tahun.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Seluruh Surat Masuk</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_masuk.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- DATA SURAT KELUAR -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Surat Keluar Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_keluar_tgl.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Surat Keluar Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_keluar_bulan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Surat Keluar Tahun Ini (<?php echo $tahun;?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_keluar_tahun.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
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
            <p>Seluruh Surat Keluar</p>
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
            <li class="active"><a href="#tab1" data-toggle="tab">Surat Keluar & Masuk</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Jumlah Surat Masuk UPTD KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
              <?php 
                $januari= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS januari_smasuk FROM surat_masuk WHERE month(Tanggal)='01' AND year(Tanggal)='2023' ");
                $februari= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS februari_smasuk FROM surat_masuk WHERE month(Tanggal)='02' AND year(Tanggal)='2023' ");
                $maret= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS maret_smasuk FROM surat_masuk WHERE month(Tanggal)='03' AND year(Tanggal)='2023' ");
                $april= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS april_smasuk FROM surat_masuk WHERE month(Tanggal)='04' AND year(Tanggal)='2023' ");
                $mei= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS mei_smasuk FROM surat_masuk WHERE month(Tanggal)='05' AND year(Tanggal)='2023' ");
                $juni= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS juni_smasuk FROM surat_masuk WHERE month(Tanggal)='06' AND year(Tanggal)='2023' ");
                $juli= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS juli_smasuk FROM surat_masuk WHERE month(Tanggal)='07' AND year(Tanggal)='2023' ");
                $agustus= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS agustus_smasuk FROM surat_masuk WHERE month(Tanggal)='08' AND year(Tanggal)='2023' ");
                $september= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS september_smasuk FROM surat_masuk WHERE month(Tanggal)='09' AND year(Tanggal)='2023' ");
                $oktober= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS oktober_smasuk FROM surat_masuk WHERE month(Tanggal)='10' AND year(Tanggal)='2023' ");
                $november= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS november_smasuk FROM surat_masuk WHERE month(Tanggal)='11' AND year(Tanggal)='2023' ");
                $desember= mysqli_query($koneksi,"SELECT COUNT(Id_Suratmasuk) AS desember_smasuk FROM surat_masuk WHERE month(Tanggal)='12' AND year(Tanggal)='2023' ");
              ?>
              <canvas id="myChart" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>

              <h4 class="text-center">Jumlah Surat Keluar UPTD KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
              <?php 
                $jan= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS januari_keluar FROM surat_keluar WHERE month(Tanggal)='01' AND year(Tanggal)='2023' ");
                $feb= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS februari_keluar FROM surat_keluar WHERE month(Tanggal)='02' AND year(Tanggal)='2023' ");
                $mart= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS maret_keluar FROM surat_keluar WHERE month(Tanggal)='03' AND year(Tanggal)='2023' ");
                $apr= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS april_keluar FROM surat_keluar WHERE month(Tanggal)='04' AND year(Tanggal)='2023' ");
                $mi= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS mei_keluar FROM surat_keluar WHERE month(Tanggal)='05' AND year(Tanggal)='2023' ");
                $jun= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS juni_keluar FROM surat_keluar WHERE month(Tanggal)='06' AND year(Tanggal)='2023'");
                $jul= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS juli_keluar FROM surat_keluar WHERE month(Tanggal)='07' AND year(Tanggal)='2023'");
                $agust= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS agustus_keluar FROM surat_keluar WHERE month(Tanggal)='08' AND year(Tanggal)='2023'");
                $sept= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS september_keluar FROM surat_keluar WHERE month(Tanggal)='09' AND year(Tanggal)='2023' ");
                $okt= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS oktober_keluar FROM surat_keluar WHERE month(Tanggal)='10' AND year(Tanggal)='2023'");
                $nov= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS november_keluar FROM surat_keluar WHERE month(Tanggal)='11' AND year(Tanggal)='2023'");
                $des= mysqli_query($koneksi,"SELECT COUNT(Id_Suratkeluar) AS desember_keluar FROM surat_keluar WHERE month(Tanggal)='12' AND year(Tanggal)='2023'");
              ?>
              <canvas id="myChart1" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>


            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
              <!-- b -->
            </div>
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

<?php include 'footer_infografis_sekre.php'; ?>