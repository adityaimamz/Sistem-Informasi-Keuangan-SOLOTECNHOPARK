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
              <br/>

              <h4 class="text-center">Grafik Penerimaan Tahun 2023 berdasarkan Metode Bayar</h4>
              <canvas id="grafik2" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>

              <h4 class="text-center">Realisasi Pengeluaran/Belanja UPT KST SOLO TECHNOPARK Per <b>Divisi</b> Tahun 2023 </h4>
              <canvas id="grafik3" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>
              <br/>
              <br/>

              <h4 class="text-center">Progress Realisasi Pengeluaran/Belanja UPT KST SOLO TECHNOPARK Per <b>Bulan</b> Tahun 2023 </h4>
              <canvas id="grafik4" style="position: relative; height: 300px;"></canvas>

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