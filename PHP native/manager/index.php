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

      <!-- DATA PENERIMAAN -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE Tanggal='$tanggal' AND Status='voice' AND Keterangan='verifikasi' ");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Penerimaan Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
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
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE month(Tanggal)='$bulan' AND Status='voice' AND Keterangan='verifikasi' ");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Penerimaan Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
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
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE year(Tanggal)='$tahun' AND Status='voice' AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Penerimaan Tahun Ini (<?php echo $tahun;?>)</p>
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
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE Status='voice' AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Seluruh Penerimaan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <!-- DATA PENGELUARAN -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Tanggal='$tanggal' AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'], 2, '.', ',')." ,-"
              
              ?>
            </h4>
            <p>Pengeluaran Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
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
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE month(Tanggal)='$bulan' AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Pengeluaran Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
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
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE year(Tanggal)='$tahun' AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Pengeluaran Tahun Ini (<?php echo $tahun;?>)</p>
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
            $pengeluaran = mysqli_query($koneksi,"SELECT sum(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_pengeluaran'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Seluruh Pengeluaran</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

      <!-- DATA TAGIHAN -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $tanggal = date('Y-m-d');
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE Tanggal='$tanggal' AND Status='invoice' AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Tagihan Hari Ini (<?php echo date('d-m-Y', strtotime($tanggal));?>)</p>
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
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE month(Tanggal)='$bulan' AND Status='invoice'  AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Tagihan Bulan Ini (<?php echo $namabulan[$bulan_ini];?>)</p>
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
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE year(Tanggal)='$tahun' AND Status='invoice'  AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Tagihan Tahun Ini (<?php echo $tahun;?>)</p>
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
            $penerimaan = mysqli_query($koneksi,"SELECT sum(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE Status='invoice'  AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "Rp. ".number_format($p['total_penerimaan'], 2, '.', ',')." ,-"
              ?>
            </h4>
            <p>Seluruh Tagihan</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>

     <!--Data verifikasi dan belum-->
     <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <?php 
            $penerimaan = mysqli_query($koneksi,"SELECT count(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE Status='voice'  AND Keterangan='nonverifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['total_penerimaan']) 
              ?>
            </h4>
            <p>Jumlah Data Penerimaan (Draft)</p>
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
            $penerimaan = mysqli_query($koneksi,"SELECT count(Besaran_biaya) as total_penerimaan FROM master_penerimaan WHERE Status='voice'  AND Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($penerimaan);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['total_penerimaan'])
              ?>
            </h4>
            <p>Jumlah Data Penerimaan (Terverifikasi)</p>
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
            $pengeluaran = mysqli_query($koneksi,"SELECT count(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Keterangan='nonverifikasi'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['total_pengeluaran'])
              ?>
            </h4>
            <p>Jumlah Data Pengeluaran (Draft)</p>
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
            $pengeluaran = mysqli_query($koneksi,"SELECT count(Jumlah) as total_pengeluaran FROM master_pengeluaran WHERE Keterangan='verifikasi'");
            $p = mysqli_fetch_assoc($pengeluaran);
            ?>
            <h4 style="font-weight: bolder">
              <?php 
              echo "".number_format($p['total_pengeluaran'])
              ?>
            </h4>
            <p>Jumlah Data Pengeluaran (Terverifikasi)</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
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
        </div>
      </div>

      <!-- DATA AGENDA -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
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
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
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
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
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
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-orange">
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
            <li class="active"><a href="#tab1" data-toggle="tab">Pemasukan & Pengeluaran</a></li>
            <li class="pull-left header">Grafik</li>
          </ul>

          <div class="tab-content" style="padding: 20px">

            <div class="chart tab-pane active" id="tab1">

              
              <h4 class="text-center">Realisasi Penerimaan UPT KST SOLO TECHNOPARK Tahun 2023 Per <b>Bulan</b></h4>
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

              <h4 class="text-center">Realisasi Pengeluaran/Belanja UPT KST SOLO TECHNOPARK Per <b>Divisi</b> Tahun 2023 </h4>
              <canvas id="myChart3" style="position: relative; height: 300px;"></canvas>

              <br/>
              <br/>
              <br/>
              <br/>

              <h4 class="text-center">Progress Realisasi Pengeluaran/Belanja UPT KST SOLO TECHNOPARK Per <b>Bulan</b> Tahun 2023 </h4>
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

<?php include 'footer.php'; ?>