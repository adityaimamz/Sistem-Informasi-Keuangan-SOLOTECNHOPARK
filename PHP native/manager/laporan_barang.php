<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Barang</small>
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
            <h3 class="box-title">Filter Laporan Barang</h3>
          </div>
          <div class="box-body">
            <form method="post" action="" enctype="multipart/form-data">
              <div class="row">
                <div class="col-md-5">

                  <div class="form-group">
                    <label>Mulai Tanggal Masuk</label>
                    <input autocomplete="off" type="text" name="tanggal_awal" class="form-control datepicker2" placeholder="Mulai Tanggal Masuk" required="required">
                  </div>

                </div>

                <div class="col-md-5">

                  <div class="form-group">
                    <label>Sampai Tanggal Masuk</label>
                    <input autocomplete="off" type="text" name="tanggal_akhir" class="form-control datepicker2" placeholder="Sampai Tanggal Masuk" required="required">
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
            <h3 class="box-title">Laporan Barang</h3>
          </div>
          <div class="box-body">
            <?php
            if(isset($_POST['tanggal_akhir']) && isset($_POST['tanggal_awal'])){
              $tgl1 = $_POST['tanggal_awal'];
              $tgl2 = $_POST['tanggal_akhir'];
            ?>
              
              <a href="laporan_barang_pdf.php?tanggal_awal=<?php echo $tgl1 ?>&tanggal_akhir=<?php echo $tgl2 ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <br><br>
              
              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>TANGGAL MASUK</th>
                      <th>TANGGAL KELUAR</th>
                      <th>NO REGISTRASI</th>
                      <th>NAMA BARANG</th>
                      <th>LOKASI GEDUNG</th>
                      <th>LOKASI RUANGAN</th>
                      <th>MERK</th>
                      <th>LABEL STP</th>
                      <th>LABEL PEMKOT</th>
                      <th>JUMLAH</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include '../koneksi.php';
                      $no=1;
                      $total=0;                         
                      $data = "SELECT master_barang.* FROM master_barang WHERE Tanggal_masuk BETWEEN '$tgl1' AND '$tgl2' ORDER BY Tanggal_masuk ASC";
                      $result = mysqli_query($koneksi, $data);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {
                          //menampilkan tabel data
                      ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal_masuk'])); ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal_keluar'])); ?></td>
                        <td class="text-center"><?php echo $row['No_registrasi']; ?></td>
                        <td><?php echo $row['Nama_barang']; ?></td>
                        <td><?php echo $row['Nama_gedung']; ?></td>
                        <td><?php echo $row['Nama_ruanganarea']; ?></td>
                        <td><?php echo $row['JenisMerkTipe']; ?></td>
                        <td><?php echo $row['Kode_label_STP']; ?></td>
                        <td><?php echo $row['Kode_label_pemkot']; ?></td>
                        <td><?php echo $row['Jumlah_barang']; ?></td>
                    </tr>
                    <?php 
                        }
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

          </div>
        </div>

      </section>
    </div>
  </section>

</div>
<?php include 'footer_laporan.php'; ?>