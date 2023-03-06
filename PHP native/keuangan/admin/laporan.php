<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      LAPORAN
      <small>Data Laporan</small>
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
            <h3 class="box-title">Filter Laporan</h3>
          </div>
          <div class="box-body">
<<<<<<< Updated upstream
            <form method="get" action="">
=======
            <form method="POST" action="laporan_pdf.php" target="_blank">
>>>>>>> Stashed changes
              <div class="row">
                <div class="col-md-3">

                  <div class="form-group">
                    <label>Mulai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_dari'])){echo $_GET['tanggal_dari'];}else{echo "";} ?>" name="tanggal_dari" class="form-control datepicker2" placeholder="Mulai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Sampai Tanggal</label>
                    <input autocomplete="off" type="text" value="<?php if(isset($_GET['tanggal_sampai'])){echo $_GET['tanggal_sampai'];}else{echo "";} ?>" name="tanggal_sampai" class="form-control datepicker2" placeholder="Sampai Tanggal" required="required">
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <label>Divisi</label>
                    <select name="divisi" class="form-control" required="required">
<<<<<<< Updated upstream
                      <option value="semua">- Semua Divisi -</option>
                      <?php 
                      $divisi = mysqli_query($koneksi,"SELECT * FROM master_divisi");
                      while($k = mysqli_fetch_array($divisi)){
=======
                      <option value="semua">- Semua -</option>
                        <?php 
                        include 'koneksi.php';
                        $divisi = mysqli_query($koneksi,"SELECT * FROM master_divisi ORDER BY Nama_divisi ASC");
                        while($k = mysqli_fetch_array($divisi)){
                          ?>
                          <option value="<?php echo $k['Id_divisi']; ?>"><?php echo $k['Nama_divisi']; ?></option>
                          <?php 
                        }
>>>>>>> Stashed changes
                        ?>
                        <option <?php if(isset($_GET['Nama_divisi'])){ if($_GET['Nama_divisi'] == $k['Id_divisi']){echo "selected='selected'";}} ?>  value="<?php echo $k['Id_divisi']; ?>"><?php echo $k['Nama_divisi']; ?></option>
                        <?php 
                      }
                      ?>
                    </select>
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">
                    <br/>
                    <input type="submit" value="TAMPILKAN" class="btn btn-sm btn-primary btn-block">
                  </div>

                </div>
              </div>
            </form>
          </div>
        </div>

<<<<<<< Updated upstream
        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Laporan Pegeluaran</h3>
          </div>
          <div class="box-body">

            <?php 
            if(isset($_GET['tanggal_sampai']) && isset($_GET['tanggal_dari']) && isset($_GET['Nama_divisi'])){
              $tgl_dari = $_GET['tanggal_dari'];
              $tgl_sampai = $_GET['tanggal_sampai'];
              $divisi = $_GET['divisi'];
              ?>

              <div class="row">
                <div class="col-lg-6">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">DARI TANGGAL</th>
                      <th width="1%">:</th>
                      <td><?php echo $tgl_dari; ?></td>
                    </tr>
                    <tr>
                      <th>SAMPAI TANGGAL</th>
                      <th>:</th>
                      <td><?php echo $tgl_sampai; ?></td>
                    </tr>
                    <tr>
                      <th>DIVISI</th>
                      <th>:</th>
                      <td>
                        <?php 
                        if($divisi == "semua"){
                          echo "SEMUA DIVISI";
                        }else{
                          $k = mysqli_query($koneksi,"SELECT * FROM master_divisi where Id_divisi='$divisi'");
                          $kk = mysqli_fetch_assoc($k);
                          echo $kk['Nama_divisi'];
                        }
                        ?>

                      </td>
                    </tr>
                  </table>
                  
                </div>
              </div>

              <a href="laporan_pdf.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&master_divisi=<?php echo $divisi ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> &nbsp CETAK PDF</a>
              <a href="laporan_print.php?tanggal_dari=<?php echo $tgl_dari ?>&tanggal_sampai=<?php echo $tgl_sampai ?>&master_divisi=<?php echo $divisi ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> &nbsp PRINT</a>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th width="1%" rowspan="2">NO</th>
                      <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                      <th rowspan="2" class="text-center">DIVISI</th>
                      <th rowspan="2" class="text-center">KETERANGAN</th>
                      <th colspan="2" class="text-center">PENGELUARAN</th>
                    </tr>
        <!--             <tr>
                      <th class="text-center">PENERIMAAN</th>
                      <th class="text-center">PENGELUARAN</th>
                    </tr> -->
                  </thead>
                  <tbody>
                    <?php 
                    include '../koneksi.php';
                    $no=1;
                    // $total_penerimaan=0;
                    $total_pengeluaran=0;
                    if($divisi == "semua"){
                      $data = mysqli_query($koneksi,"SELECT * FROM master_pengeluaran,master_divisi where master_divisi.Id_divisi=master_pengeluaran.Id_divisi and date(Tanggal)>='$tgl_dari' and date(Tanggal)<='$tgl_sampai'");
                    }else{
                      $data = mysqli_query($koneksi,"SELECT * FROM master_pengeluaran,master_divisi where master_divisi.Id_divisi=master_pengeluaran.Id_divisi and master_divisi.Id_divisi='$divisi' and date(Tanggal)>='$tgl_dari' and date(Tanggal)<='$tgl_sampai'");
                    }
                    while($d = mysqli_fetch_array($data)){
                      $total_pengeluaran += $d['Jumlah']; ?>
                      <tr>
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center"><?php echo date('d-m-Y', strtotime($d['Tanggal'])); ?></td>
                        <td><?php echo $d['Nama_divisi']; ?></td>
                        <td><?php echo $d['Rincian']; ?></td>
                        <td class="text-center">
                          <?php 
                          if($d['Jumlah'] != 0){
                            echo "Rp. ".number_format($d['Jumlah'])." ,-";
                          }else{
                            echo "-";
                          }
                          ?>
                        </td>
                      </tr>
                      <?php 
                    }
                    ?>
                    <tr>
                      <th colspan="4" class="text-right">TOTAL</th>
                      <!-- <td class="text-center text-bold text-success"><?php echo "Rp. ".number_format($total_penerimaan)." ,-"; ?></td> -->
                      <td class="text-center text-bold text-danger"><?php echo "Rp. ".number_format($total_pengeluaran)." ,-"; ?></td>
                    </tr>
                    <tr>
                      <th colspan="4" class="text-right">SALDO</th>
                      <td colspan="2" class="text-center text-bold text-white bg-primary"><?php echo "Rp. ".number_format($total_pengeluaran)." ,-"; ?></td>
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
=======
>>>>>>> Stashed changes
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>