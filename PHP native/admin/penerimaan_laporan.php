<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Penerimaan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
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

              <a href="penerimaan_laporan_print.php?tanggal_awal=<?php echo $tgl1 ?>&tanggal_akhir=<?php echo $tgl2 ?>&metode=<?php echo $metode ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <br><br>

               <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>TANGGAL</th>
                      <th>NAMA</th>
                      <th>METODE BAYAR</th>
                      <th>KEPERLUAN</th>
                      <th>BESARAN BIAYA</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include '../koneksi.php';
                      $no=1;
                      $total=0;                         
                      if($metode == "semua"){
                        $data = "SELECT * FROM master_penerimaan,metode_bayar where metode_bayar.Id_metode = master_penerimaan.Id_metode and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2' and master_penerimaan.Keterangan='verifikasi' and master_penerimaan.Status='voice' ORDER BY Tanggal ASC";
                      }else{
                        $data = "SELECT metode_bayar.Jenis, master_penerimaan.* FROM master_penerimaan JOIN metode_bayar ON metode_bayar.Id_metode = master_penerimaan.Id_metode WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_penerimaan.Id_metode = '$metode' and master_penerimaan.Keterangan='verifikasi' and master_penerimaan.Status='voice' ORDER BY Tanggal ASC";
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
                      <td><?php echo $row['Nama_pembayar']; ?></td>
                        <td><?php echo $row['Jenis']; ?></td>
                        <td><?php echo $row['Keperluan']; ?></td>
                        <td class="text-left"><?php echo "Rp. ".number_format($row['Besaran_biaya'], 2, '.', ',')." ,-"; ?></td>
                    </tr>
                    <?php 
                        }
                      }
                    ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <table class="table table-bordered table-striped">
                <tr>
                  <th colspan="6" class="text-right">TOTAL</th>
                  <td class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total)." ,-"; ?></td>
                </tr>
              </table>
              <?php 
            }else{ //isset data post
              ?>

              <div class="alert alert-info text-center">
                Silahkan Filter Laporan Terlebih Dulu.
              </div>

              <?php
            }
            ?>

            </div>
            <!-- /.card -->

          </div>
        </div>

      </section>
    </div>
  </section>

<!-- </div> -->
<?php include 'footer_laporan.php'; ?>