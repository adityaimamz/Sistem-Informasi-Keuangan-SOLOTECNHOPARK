<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Penerimaan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Filter Laporan Penerimaan</h3>
          </div>
          <div class="box-body">
            <form method="post" action="" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" name="tanggal_awal" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" name="tanggal_akhir" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Metode Pembayaran</label>
                    <select name="metode" class="form-control" required="required">
                      <option value="semua">- Semua Metode Bayar -</option>
                        <?php 
                        include 'koneksi.php';
                        $metode = mysqli_query($koneksi,"SELECT * FROM metode_bayar ORDER BY Jenis ASC");
                        while($k = mysqli_fetch_array($metode)){
                          ?>
                          <option value="<?php echo $k['Id_metode']; ?>"><?php echo $k['Jenis']; ?></option>
                          <?php 
                        }
                        ?>
                    </select>
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <br/>
                    <input type="submit" name="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Penerimaan</h3>
          </div>
          <div class="box-body">
            <?php
            if(isset($_POST['tanggal_akhir']) && isset($_POST['tanggal_awal']) && isset($_POST['metode'])){
              $tgl1 = $_POST['tanggal_awal'];
              $tgl2 = $_POST['tanggal_akhir'];
              $metode = $_POST['metode'];
            ?>
              <div class="table-responsive">
                <form class="form-horizontal" method="post" action="penerimaan_laporan_pdf.php" enctype="multipart/form-data" target="_blank">
                  <input type="hidden" name="tanggal_awal" id="tanggal_awal" value="<?php echo $_POST['tanggal_awal']; ?>"> 
                  <input type="hidden" name="tanggal_akhir" id="tanggal_akhir" value="<?php echo $_POST['tanggal_akhir']; ?>">
                  <input type="hidden" name="metode" id="metode" value="<?php echo $_POST['metode']; ?>">
                  <button class="btn bg-orange" type="submit" align="left" class="btn bg-orange" name="Print" id="Print">
                    <i class="fa fa-print"></i> &nbsp PDF
                  </button>
                  <!-- <i class="fa fa-print"><input type="submit" align="left" class="btn bg-orange" name="Print" id="Print" value="PDF" /></i> -->
                </form>
                </br>

                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="1%" rowspan="2">NO</th>
                      <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                      <th rowspan="2" class="text-center">METODE BAYAR</th>
                      <th rowspan="2" class="text-center">KEPERLUAN</th>
                      <th colspan="2" class="text-center">BESARAN BIAYA</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    include '../koneksi.php';
                    $no=1;
                    $total=0;                         
                    // $querydata = "SELECT metode_bayar.Jenis, master_penerimaan.* FROM master_penerimaan JOIN metode_bayar ON metode_bayar.Id_metode = master_penerimaan.Id_metode WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_penerimaan.Id_metode = '$metode'";
                    if($metode == "semua"){
                      $data = "SELECT * FROM master_penerimaan,metode_bayar where metode_bayar.Id_metode = master_penerimaan.Id_metode and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2'";
                    }else{
                      $data = "SELECT metode_bayar.Jenis, master_penerimaan.* FROM master_penerimaan JOIN metode_bayar ON metode_bayar.Id_metode = master_penerimaan.Id_metode WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_penerimaan.Id_metode = '$metode'";
                    }
                    $result = mysqli_query($koneksi, $data);
                    //memeriksa apakah ada data yang ditemukan
                    if (mysqli_num_rows($result) > 0) { 
                      while ($row = mysqli_fetch_assoc($result)) {
                        $total=$total+$row['Besaran_biaya'];
                         //menampilkan tabel data
                        ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal'])); ?></td>
                        <td><?php echo $row['Jenis']; ?></td>
                        <td><?php echo $row['Keperluan']; ?></td>
                        <td class="text-right"><?php echo "Rp. ".number_format($row["Besaran_biaya"])." ,-" ; ?></td>
                      </tr>
                      <?php 
                    }
                  }else{ ?>
                    <div class="alert alert-danger text-center">
                      Data Kosong
                    </div>
                  <?php
                  }
                    ?>
                    <tr>
                      <th colspan="4" class="text-right">TOTAL</th>
                      <td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total)." ,-"; ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <?php 
            }else{
              ?>

              <div class="alert alert-info text-center">
                Silahkan Filter Laporan Terlebih Dulu.
              </div>

              <?php
            }
            ?>

          </div>
        </div>

      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>