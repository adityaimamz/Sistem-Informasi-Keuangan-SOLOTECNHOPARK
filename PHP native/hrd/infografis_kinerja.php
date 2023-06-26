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

  <div class="col-lg-3 col-xs-6">
  <div class="small-box bg-blue">
    <div class="inner">
      <?php 
      $cluster = mysqli_query($koneksi, "SELECT COUNT(Id_penilaian) AS jumlah_baris FROM penilaian WHERE Ratarata_nilai/3 >= 0 AND Ratarata_nilai/3 <= 2");
      $p = mysqli_fetch_assoc($cluster);
      ?>
      
      <h4 style="font-weight: bolder">
      <?php 
       echo $p['jumlah_baris']
        ?>
      </h4>
      <p>Cluster nilai 0-2</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
  </div>
</div>

<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-blue">
    <div class="inner">
    <?php 
      $cluster = mysqli_query($koneksi,"SELECT COUNT(Id_penilaian) AS jumlah_baris FROM penilaian WHERE Ratarata_nilai/3 >= 3 AND Ratarata_nilai/3 <= 4");
      $p = mysqli_fetch_assoc($cluster);
      ?>
      
      <h4 style="font-weight: bolder">
      <?php 
       echo $p['jumlah_baris']
        ?>
      </h4>
      <p>Cluster nilai 3-4</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
        
        <h4 style="font-weight: bolder">Karyawan 3 Besar</h4>
        <p>Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
        </div>
        <div class="icon">
        <i class="ion ion-stats-bars"></i>
        </div>
        <a href="karyawan_3besar.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
              <h4 class="text-center">Nilai Rata-rata karyawan per bulan <b>2023</b></h4>
              <?php
              $months = [
                  "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
              ];

              $data = [];
              foreach ($months as $month) {
                  $query = mysqli_query($koneksi, "SELECT SUM(Ratarata_nilai)/(3*(COUNT(DISTINCT Id_karyawan))) AS rata_nilai FROM penilaian WHERE Bulan='$month' AND Tahun='2023'");
                  $row = mysqli_fetch_assoc($query);
                  $data[] = round(($row['rata_nilai']),2);
              }
              ?>
              <canvas id="myChart" style="position: relative; height: 300px;"></canvas>
              <br><br>

              <h4 class="text-center">Nilai tertinggi karyawan per bulan<b>2023</b></h4>
              <?php
              $months = [
                  "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"
              ];

              $data = [];
              foreach ($months as $month) {
                  $query = mysqli_query($koneksi, "SELECT MAX(Ratarata_nilai) AS nilai_tertinggi FROM penilaian WHERE Bulan='$month' AND Tahun='2023'");
                  $row = mysqli_fetch_assoc($query);
                  $data[] = round(($row['nilai_tertinggi']/3), 2);
              }
              ?>
              <canvas id="myChart1" style="position: relative; height: 300px;"></canvas>
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