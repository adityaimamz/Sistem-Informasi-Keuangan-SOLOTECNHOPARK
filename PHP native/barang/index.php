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

      <!-- DATA barang -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
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
        <div class="small-box bg-green">
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
        <div class="small-box bg-green">
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
        <div class="small-box bg-green">
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

      <!-- DATA barang -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $barang = mysqli_query($koneksi,"SELECT sum(Jumlah_barang) as total_barang FROM master_barang WHERE Tanggal_keluar='$tanggal'");
            $p = mysqli_fetch_assoc($barang);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              
              ?>
            </h4>
            <p>Barang Keluar Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $bulan = date('m');
            $barang = mysqli_query($koneksi,"SELECT sum(Jumlah_barang) as total_barang FROM master_barang WHERE month(Tanggal_keluar)='$bulan'");
            $p = mysqli_fetch_assoc($barang);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              ?>
            </h4>
            <p>Barang Keluar Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $tahun = date('Y');
            $barang = mysqli_query($koneksi,"SELECT sum(Jumlah_barang) as total_barang FROM master_barang WHERE year(Tanggal_keluar)='$tahun'");
            $p = mysqli_fetch_assoc($barang);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              ?>
            </h4>
            <p>Barang Keluar Tahun Ini (<?php echo $tahun;?>)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $barang = mysqli_query($koneksi,"SELECT sum(Jumlah_barang) as total_barang FROM master_barang");
            $p = mysqli_fetch_assoc($barang);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
               echo "".number_format($p['total_barang'])
              ?>
            </h4>
            <p>Seluruh Barang Keluar</p>
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
            <li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Realisasi Penerimaan UPTD KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
              <?php 
                $januari= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_januari FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Januari' AND Status='Voice' ");
                $februari= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_februari FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Februari' AND Status='Voice' ");
                $maret= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_maret FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Maret' AND Status='Voice' ");
                $april= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_april FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='April' AND Status='Voice' ");
                $mei= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_mei FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Mei' AND Status='Voice' ");
                $juni= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_juni FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Juni' AND Status='Voice' ");
                $juli= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_juli FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Juli' AND Status='Voice' ");
                $agustus= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_agustus FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Agustus' AND Status='Voice' ");
                $september= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_september FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='September' AND Status='Voice' ");
                $oktober= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_oktober FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Oktober' AND Status='Voice' ");
                $november= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_november FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='November' AND Status='Voice' ");
                $desember= mysqli_query($koneksi,"SELECT SUM(besaran_biaya) AS total_desember FROM master_penerimaan WHERE Keterangan='Verifikasi' AND Bulan='Desember' AND Status='Voice' ");
              ?>
              <canvas id="myChart" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>

              <h4 class="text-center">Grafik Penerimaan Tahun 2023 berdasarkan Metode Bayar</h4>
              <canvas id="myChart2" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>

              <h4 class="text-center">Realisasi Pengeluaran/Belanja UPTD KST SOLO TECHNOPARK Per <b>Divisi</b> Tahun 2023 </h4>
              <canvas id="myChart3" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>
              <br/>
              <br/>

              <h4 class="text-center">Progress Realisasi Pengeluaran/Belanja UPTD KST SOLO TECHNOPARK Per <b>Bulan</b> Tahun 2023 </h4>
              <?php 
                $jan= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_jan FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Januari' ");
                $feb= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_feb FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Februari' ");
                $mart= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_mart FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Maret' ");
                $apr= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_apr FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='April' ");
                $mi= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_mi FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Mei' ");
                $jun= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_jun FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Juni' ");
                $jul= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_jul FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Juli' ");
                $agust= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_agust FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Agustus' ");
                $sept= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_sept FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='September' ");
                $okt= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_okt FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Oktober' ");
                $nov= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_nov FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='November' ");
                $des= mysqli_query($koneksi,"SELECT SUM(Jumlah) AS total_des FROM master_pengeluaran WHERE Keterangan='Verifikasi' AND Bulan='Desember' ");
              ?>
              <canvas id="myChart4" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>


            </div>
            <div class="chart tab-pane" id="tab2" style="position: relative; height: 300px;">
              b
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

<?php include 'footer.php'; ?>