<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Peserta Inkubator</small>
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
            <h3 class="box-title">Filter Laporan Inkubator</h3>
          </div>
          <div class="box-body">
            <form method="post" action="" enctype="multipart/form-data">
              <div class="row">

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" required="required">
                      <option value="semua">- Semua Status -</option>
                        <?php 
                        include 'koneksi.php';
                        $status = mysqli_query($koneksi,"SELECT * FROM status_inkubator ORDER BY Id_statusinkubator ASC");
                        while($k = mysqli_fetch_array($status)){
                          ?>
                          <option value="<?php echo $k['Id_statusinkubator']; ?>"><?php echo $k['Status']; ?></option>
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
          <h3 class="box-title">Laporan inkubator</h3>
              </div>
              <div class="box-body">
              <?php
              if(isset($_POST['status'])){
                $status = $_POST['status'];
              ?>
                <a href="inkubator_laporan_pdf.php?status=<?php echo $status ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
                <br><br>


              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                    <th>NO</th>
                    <th>NAMA STARTUP</th>
                    <th>NAMA PENGUSUL</th>
                    <th>ALAMAT</th>
                    <th>TAHUN ANGKATAN</th>
                    <th>STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    $total=0;                         
                    // $querydata = "SELECT metode_bayar.Jenis, master_penerimaan.* FROM master_penerimaan JOIN metode_bayar ON metode_bayar.Id_metode = master_penerimaan.Id_metode WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_penerimaan.Id_metode = '$metode'";
                    if ($status == "semua") {
                      $data = "SELECT * FROM inkubator, status_inkubator WHERE status_inkubator.Id_statusinkubator = inkubator.Id_statusinkubator ORDER BY Id_inkubator ASC";
                    } else {
                      $data = "SELECT  status_inkubator.Status, inkubator.* FROM inkubator LEFT JOIN status_inkubator ON inkubator.Id_statusinkubator=status_inkubator.Id_statusinkubator WHERE inkubator.Id_statusinkubator = '$status' ORDER BY Id_inkubator ASC";
                    }          
                    $result = mysqli_query($koneksi, $data);
                    //memeriksa apakah ada data yang ditemukan
                    if (mysqli_num_rows($result) > 0) { 
                      while ($row = mysqli_fetch_assoc($result)) {
                         //menampilkan tabel data
                        ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td><?php echo $row['Nama_startup']; ?></td>
                            <td><?php echo $row['Nama_pengusul']; ?></td>
                            <td><?php echo $row['Alamat']; ?></td>
                            <td><?php echo $row['Tahun_angkatan']; ?></td>
                            <td><?php echo $row['Status']; ?></td>
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