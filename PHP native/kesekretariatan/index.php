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
            <p>Surat Masuk Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
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
            <p>Surat Masuk Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
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
            <p>Surat Masuk Tahun Ini (<?php echo $tahun;?>)</p>
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
            <p>Surat Keluar Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
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
            <p>Surat Keluar Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
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
            <p>Surat Keluar Tahun Ini (<?php echo $tahun;?>)</p>
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
            <p>Seluruh Surat Keluar</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="surat_keluar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- DATA AGENDA -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $agenda = mysqli_query($koneksi,"SELECT count(Id_agenda) as total_agendahari FROM master_agenda WHERE Tanggal='$tanggal'");
            $p = mysqli_fetch_assoc($agenda);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
             echo $p['total_agendahari']
              ?>
            </h4>
            <p>Agenda Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="agenda_tgl.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php
            $bulan = date('m');
            $agenda = mysqli_query($koneksi,"SELECT count(Id_agenda) as total_agendabulan FROM master_agenda WHERE month(Tanggal)='$bulan'");
            $p = mysqli_fetch_assoc($agenda);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
             echo $p['total_agendabulan']
              ?>
            </h4>
            <p>Agenda Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="agenda_bulan.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $agenda = mysqli_query($koneksi,"SELECT count(Id_agenda) as total_agendatahun FROM master_agenda WHERE year(Tanggal)='$tahun'");
            $p = mysqli_fetch_assoc($agenda);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
             echo $p['total_agendatahun']
              ?>
            </h4>
            <p>Agenda Tahun Ini (<?php echo $tahun;?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="agenda_tahun.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <?php 
            $agenda = mysqli_query($koneksi,"SELECT count(Id_agenda) as total_agenda FROM master_agenda");
            $p = mysqli_fetch_assoc($agenda);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
             echo $p['total_agenda']
              ?>
            </h4>
            <p>Seluruh Agenda</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="agenda.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <p>Jumlah Data Pengunjung Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
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
            <p>Jumlah Data Pengunjung Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
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
            <p>Jumlah Data Pengunjung Tahun Ini (<?php echo $tahun;?>)</p>
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
            <p>Jumlah Seluruh Data Pengunjung</p>
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
            <!--<li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & pengeluaran</a></li>-->
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Realisasi Jumlah Kunjungan UPTD KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
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
              <canvas id="myChart" style="position: relative; height: 300px;"></canvas>

            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
              
            </div>
          </div>
          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Realisasi Kesekretariatan UPTD KST SOLO TECHNOPARK Tahun 2023 Per <b>Jenis</b></h4>
              <?php 
                $suratmasuk= mysqli_query($koneksi,"SELECT count(Id_Suratmasuk) as total_suratmasuk FROM surat_masuk");
                $suratkeluar= mysqli_query($koneksi,"SELECT count(Id_Suratkeluar) as total_suratkeluar FROM surat_keluar");
                $agenda= mysqli_query($koneksi,"SELECT count(Id_agenda) as total_agenda FROM master_agenda");

              ?>
              <canvas id="myChart2" style="position: relative; height: 300px;"></canvas>

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
<div id="preloader"></div>
<?php include 'footer.php'; ?>