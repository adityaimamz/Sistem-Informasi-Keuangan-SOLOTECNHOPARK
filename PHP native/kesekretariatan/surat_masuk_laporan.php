<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Surat Masuk</small>
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
            <h3 class="box-title">Filter Laporan Surat Masuk</h3>
          </div>
          <div class="box-body">
            <form method="post" action="" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-5">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" name="tanggal_awal" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-5">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" name="tanggal_akhir" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-2">

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
            <h3 class="box-title">Laporan Surat Masuk</h3>
          </div>
          <div class="box-body">
            <?php
            if(isset($_POST['tanggal_akhir']) && isset($_POST['tanggal_awal'])){
              $tgl1 = $_POST['tanggal_awal'];
              $tgl2 = $_POST['tanggal_akhir'];
            ?>
              <a href="surat_masuk_laporan_print.php?tanggal_awal=<?php echo $tgl1 ?>&tanggal_akhir=<?php echo $tgl2 ?>&divisi=<?php echo $divisi ?>&sumberdana=<?php echo $dana ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <br><br>

              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th class="text-center">TANGGAL</th>
                      <th>NOMOR SURAT MASUK</th>
                      <th>NOMOR SURAT</th>
                      <th>TERIMA DARI</th>
                      <th>ISI</th>
                      <th>CATATAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include '../koneksi.php';
                      $no=1;
                      $data = "SELECT * FROM surat_masuk WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' ORDER BY Tanggal ASC";
                      $result = mysqli_query($koneksi, $data);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {
                           //menampilkan tabel data
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $no++; ?></td>
                          <td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal'])); ?></td>
                          <td><?php echo $row['No_Suratmasuk']; ?></td>
                          <td><?php echo $row['Nomor_surat']; ?></td>
                          <td><?php echo $row['Terima_dari']; ?></td>
                          <td><?php echo $row['Isi']; ?></td>
                          <td><?php echo $row['Catatan']; ?></td>
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
                    </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
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
</div>
<?php include 'footer_laporan.php'; ?>

