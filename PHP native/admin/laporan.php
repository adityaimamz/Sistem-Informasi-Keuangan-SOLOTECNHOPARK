<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Pengeluaran</small>
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
            <h3 class="box-title">Filter Laporan Pengeluaran</h3>
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

              <div class="row">
                <div class="col-md-5">

                  <div class="form-group">
                    <label>Divisi</label>
                    <select name="divisi" class="form-control" required="required">
                      <option value="semuadivisi">- Semua Divisi -</option>
                        <?php 
                        include 'koneksi.php';
                        $divisi = mysqli_query($koneksi,"SELECT * FROM master_divisi ORDER BY Nama_divisi ASC");
                        while($k = mysqli_fetch_array($divisi)){
                          ?>
                          <option value="<?php echo $k['Id_divisi']; ?>"><?php echo $k['Nama_divisi']; ?></option>
                          <?php 
                        }
                        ?>
                    </select>
                  </div>

                </div>

                <div class="col-md-5">

                  <div class="form-group">
                    <label>Sumber Dana</label>
                    <select name="sumberdana" class="form-control" required="required">
                      <option value="semuadana">- Semua Sumber Dana -</option>
                        <?php 
                        include 'koneksi.php';
                        $dana = mysqli_query($koneksi,"SELECT * FROM master_sumberdana ORDER BY Jenis ASC");
                        while($k = mysqli_fetch_array($dana)){
                          ?>
                          <option value="<?php echo $k['Id_sumberdana']; ?>"><?php echo $k['Jenis']; ?></option>
                          <?php 
                        }
                        ?>
                    </select>
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Pegeluaran</h3>
          </div>
          <div class="box-body">
            <?php
            if(isset($_POST['tanggal_akhir']) && isset($_POST['tanggal_awal']) && isset($_POST['divisi']) && isset($_POST['sumberdana'])){
              $tgl1 = $_POST['tanggal_awal'];
              $tgl2 = $_POST['tanggal_akhir'];
              $divisi = $_POST['divisi'];
              $dana = $_POST['sumberdana'];
            ?>
              <!-- <a href="laporan_excel.php?tanggal_awal=<?php echo $tgl1 ?>&tanggal_akhir=<?php echo $tgl2 ?>&divisi=<?php echo $divisi ?>&sumberdana=<?php echo $dana ?>" class="btn btn-sm btn-success"><i class="fa fa-file-excel-o"></i> &nbsp CSV</a> -->
              <!-- <a href="divisi_csv.php"><button type="button" class="btn btn-success btn-sm">
                <i class="fa fa-file-excel-o"></i> &nbsp CSV
              </button></a> -->
              <a href="laporan_print.php?tanggal_awal=<?php echo $tgl1 ?>&tanggal_akhir=<?php echo $tgl2 ?>&divisi=<?php echo $divisi ?>&sumberdana=<?php echo $dana ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <br><br>
              
              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>TANGGAL</th>
                      <th>SUMBER DANA</th>
                      <th>DIVISI</th>
                      <th>KETERANGAN</th>
                      <th>JUMLAH</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      include '../koneksi.php';
                      $no=1;
                      $total=0;                         
                      if($divisi == "semuadivisi" && $dana == "semuadana"){
                        $data = "SELECT * FROM master_pengeluaran,master_divisi,master_sumberdana where master_divisi.Id_divisi = master_pengeluaran.Id_divisi and master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2' and master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
                      }elseif($divisi == "semuadivisi" && $dana != "semuadana"){
                        $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_sumberdana = '$dana' AND master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
                      }elseif($dana == "semuadana" && $divisi != "semuadivisi"){
                        $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi='$divisi' AND master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
                      }else{
                        $data = "SELECT master_divis bi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi = '$divisi' AND master_pengeluaran.Id_sumberdana = '$dana' and master_pengeluaran.Keterangan='verifikasi' ORDER BY Tanggal ASC";
                      }
                      $result = mysqli_query($koneksi, $data);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {
                          $total=$total+$row['Jumlah'];
                          //menampilkan tabel data
                      ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td class="text-center"><?php echo date('d-m-Y', strtotime($row['Tanggal'])); ?></td>
                      <td><?php echo $row['Jenis']; ?></td>
                      <td><?php echo $row['Nama_divisi']; ?></td>
                      <td><?php echo $row['Rincian']; ?></td>
                      <td class="text-left"><?php echo "Rp. ".number_format($row['Jumlah'], 2, '.', ',')." ,-"; ?></td>
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
