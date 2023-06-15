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
      
      <!-- DATA AGENDA -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $barang = mysqli_query($koneksi,"SELECT count(Jumlah_barang) as total_barang FROM master_barang WHERE Tanggal_masuk='$tanggal'");
            $p = mysqli_fetch_assoc($barang);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              ?>
            </h4>
            <p>Barang Masuk Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php
            $bulan = date('m');
            $barang = mysqli_query($koneksi,"SELECT sum(Jumlah_barang) as total_barang FROM master_barang WHERE month(Tanggal_masuk)='$bulan'");
            $p = mysqli_fetch_assoc($barang);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              ?>
            </h4>
            <p>Barang Masuk Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $barang = mysqli_query($koneksi,"SELECT sum(Jumlah_barang) as total_barang FROM master_barang WHERE year(Tanggal_masuk)='$tahun'");
            $p = mysqli_fetch_assoc($barang);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              ?>
            </h4>
            <p>Barang Masuk Tahun Ini (<?php echo $tahun;?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $barang = mysqli_query($koneksi,"SELECT sum(Jumlah_barang) as total_barang FROM master_barang ");
            $p = mysqli_fetch_assoc($barang);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              ?>
            </h4>
            <p>Seluruh Barang Masuk</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      
      <!--Data jumlah pengunjung-->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $pengunjung = mysqli_query($koneksi,"SELECT sum(Jumlah_pengunjung) as pengunjung_hari FROM master_agenda WHERE Tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($pengunjung);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['pengunjung_hari'])
              ?>
            </h4>
            <p>Jumlah Kunjungan Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $bulan = date('m');
            $pengunjung = mysqli_query($koneksi,"SELECT sum(Jumlah_pengunjung) as pengunjung_bulan FROM master_agenda WHERE month(Tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($pengunjung);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['pengunjung_bulan'])
              ?>
            </h4>
            <p>Jumlah Kunjungan Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $pengunjung = mysqli_query($koneksi,"SELECT sum(Jumlah_pengunjung) as pengunjung_tahun FROM master_agenda  WHERE year(Tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($pengunjung);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['pengunjung_tahun'])
              ?>
            </h4>
            <p>Jumlah Kunjungan Tahun Ini (<?php echo $tahun;?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
          <div class="inner">
            <?php 
            $pengunjung = mysqli_query($koneksi,"SELECT sum(Jumlah_pengunjung) as pengunjung FROM master_agenda");
            $p = mysqli_fetch_assoc($pengunjung);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['pengunjung'])
              ?>
            </h4>
            <p>Jumlah Seluruh Kunjungan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
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
            <!--<li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>-->
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">
              <h4 class="text-center">Jumlah Penambahan Asset UPTD KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
                  <?php
                    $barang_januari= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_januari FROM master_barang WHERE month(Tanggal_masuk_barang)='01' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_februari= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_februari FROM master_barang WHERE month(Tanggal_masuk_barang)='02' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_maret= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_maret FROM master_barang WHERE month(Tanggal_masuk_barang)='03' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_april= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_april FROM master_barang WHERE month(Tanggal_masuk_barang)='04' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_mei= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_mei FROM master_barang WHERE month(Tanggal_masuk_barang)='05' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_juni= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_juni FROM master_barang WHERE month(Tanggal_masuk_barang)='06' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_juli= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_juli FROM master_barang WHERE month(Tanggal_masuk_barang)='07' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_agustus= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_agustus FROM master_barang WHERE month(Tanggal_masuk_barang)='08' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_september= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_september FROM master_barang WHERE month(Tanggal_masuk_barang)='09' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_oktober= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_oktober FROM master_barang WHERE month(Tanggal_masuk_barang)='10' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_november= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_november FROM master_barang WHERE month(Tanggal_masuk_barang)='11' AND year(Tanggal_masuk_barang)='2023' ");
                    $barang_desember= mysqli_query($koneksi,"SELECT SUM(Jumlah_barang) AS barang_desember FROM master_barang WHERE month(Tanggal_masuk_barang)='12' AND year(Tanggal_masuk_barang)='2023' ");
                  ?>
              <canvas id="myChart" style="position: relative; height: 300px;"></canvas>
              
              <h4 class="text-center">Jumlah Kunjungan UPTD KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
                  <?php
                    $agenda_januari= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_januari FROM master_agenda WHERE month(Tanggal)='01' AND year(Tanggal)='2023' ");
                    $agenda_februari= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_februari FROM master_agenda WHERE month(Tanggal)='02' AND year(Tanggal)='2023' ");
                    $agenda_maret= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_maret FROM master_agenda WHERE month(Tanggal)='03' AND year(Tanggal)='2023' ");
                    $agenda_april= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_april FROM master_agenda WHERE month(Tanggal)='04' AND year(Tanggal)='2023' ");
                    $agenda_mei= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_mei FROM master_agenda WHERE month(Tanggal)='05' AND year(Tanggal)='2023' ");
                    $agenda_juni= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_juni FROM master_agenda WHERE month(Tanggal)='06' AND year(Tanggal)='2023' ");
                    $agenda_juli= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_juli FROM master_agenda WHERE month(Tanggal)='07' AND year(Tanggal)='2023' ");
                    $agenda_agustus= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_agustus FROM master_agenda WHERE month(Tanggal)='08' AND year(Tanggal)='2023' ");
                    $agenda_september= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_september FROM master_agenda WHERE month(Tanggal)='09' AND year(Tanggal)='2023' ");
                    $agenda_oktober= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_oktober FROM master_agenda WHERE month(Tanggal)='10' AND year(Tanggal)='2023' ");
                    $agenda_november= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_november FROM master_agenda WHERE month(Tanggal)='11' AND year(Tanggal)='2023' ");
                    $agenda_desember= mysqli_query($koneksi,"SELECT SUM(Jumlah_pengunjung) AS total_agenda_desember FROM master_agenda WHERE month(Tanggal)='12' AND year(Tanggal)='2023' ");
                  ?>
              <canvas id="myChart1" style="position: relative; height: 300px;"></canvas>
             
            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
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

<?php include 'footer_infografis_barang.php'; ?>