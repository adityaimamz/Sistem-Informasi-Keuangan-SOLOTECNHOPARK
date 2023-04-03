<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan Pengeluaran</small>
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
                      <option value="semua">- Semua Divisi -</option>
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
                      <option value="semua">- Semua Sumber Dana -</option>
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
            if(isset($_POST['tanggal_akhir']) && isset($_POST['tanggal_awal']) && isset($_POST['divisi'])){
              $tgl1 = $_POST['tanggal_awal'];
              $tgl2 = $_POST['tanggal_akhir'];
              $divisi = $_POST['divisi'];
              $dana = $_POST['sumberdana'];
            ?>
              <div class="table-responsive">
                <form class="form-horizontal" method="post" action="laporan_pdf.php" enctype="multipart/form-data" target="_blank">
                  <input type="hidden" name="tanggal_awal" id="tanggal_awal" value="<?php echo $_POST['tanggal_awal']; ?>"> 
                  <input type="hidden" name="tanggal_akhir" id="tanggal_akhir" value="<?php echo $_POST['tanggal_akhir']; ?>">
                  <input type="hidden" name="divisi" id="divisi" value="<?php echo $_POST['divisi']; ?>">
                  <input type="hidden" name="sumberdana" id="sumberdana" value="<?php echo $_POST['sumberdana']; ?>">
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
                      <th rowspan="2" class="text-center">SUMBER DANA</th>
                      <th rowspan="2" class="text-center">DIVISI</th>
                      <th rowspan="2" class="text-center">KETERANGAN</th>
                      <th colspan="2" class="text-center">JUMLAH</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    include '../koneksi.php';
                    $no=1;
                    $total=0;                         
                    if($divisi == "semua"){
                      $data = "SELECT * FROM master_pengeluaran,master_divisi,master_sumberdana where master_divisi.Id_divisi = master_pengeluaran.Id_divisi and master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana and date(Tanggal)>='$tgl1' and date(Tanggal)<='$tgl2' and master_pengeluaran.Keterangan='verifikasi'";
                    }else{
                      $data = "SELECT master_divisi.Nama_divisi, master_pengeluaran.*,master_sumberdana.Jenis FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi JOIN master_sumberdana ON master_sumberdana.Id_sumberdana=master_pengeluaran.Id_sumberdana WHERE Tanggal BETWEEN '$tgl1' AND '$tgl2' AND master_pengeluaran.Id_divisi = '$divisi' AND master_pengeluaran.Id_sumberdana = '$dana' and master_pengeluaran.Keterangan='verifikasi'";
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
                  }else{ ?>
                    <div class="alert alert-danger text-center">
                      Data Kosong
                    </div>
                  <?php
                  }
                    ?>
                    <tr>
                      <th colspan="4" class="text-right">TOTAL</th>
                      <td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total, 2, '.', ',')." ,-"; ?></td>
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
