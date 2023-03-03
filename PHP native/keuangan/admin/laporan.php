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
            <form method="POST" action="">
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
                    <label>Divisi</label>
                    <select name="divisi" class="form-control" required="required">
                      <option value="">- Pilih -</option>
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
            <h3 class="box-title">Laporan Pegeluaran</h3>
          </div>
          <div class="box-body">
            <?php
            include '../koneksi.php';
            $no=1;

            //memeriksa apakah form telah disubmit
            if (isset($_POST['submit'])) {

                //mengambil nilai form
                $tanggal_awal = $_POST['tanggal_awal'];
                $tanggal_akhir = $_POST['tanggal_akhir'];
                $divisi = $_POST['divisi'];

                //mengambil data dari database
                $sql = "SELECT master_divisi.Nama_divisi, master_pengeluaran.* FROM master_pengeluaran JOIN master_divisi ON master_divisi.Id_divisi = master_pengeluaran.Id_divisi WHERE Tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' AND master_pengeluaran.Id_divisi = '$divisi'";
                $result = mysqli_query($koneksi, $sql);

                //memeriksa apakah ada data yang ditemukan
                if (mysqli_num_rows($result) > 0) {
                  //menampilkan tabel data
                  ?> 
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th width="1%" rowspan="2">NO</th>
                          <th width="10%" rowspan="2" class="text-center">TANGGAL</th>
                          <th rowspan="2" class="text-center">DIVISI</th>
                          <th rowspan="2" class="text-center">RINCIAN</th>
                          <th colspan="2" class="text-center">JUMLAH</th>
                      </thead>
                      <?php
                      while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tbody>
                        <tr>
                          <td class="text-center"><?php echo $no++; ?></td>
                          <td class="text-center"><?php echo $row["Tanggal"]; ?></td>
                          <td class="text-center"><?php echo $row["Nama_divisi"]; ?></td>
                          <td class="text-center"><?php echo $row["Rincian"]; ?></td>
                          <td class="text-center"><?php echo $row["Jumlah"]; ?></td>
                          </td>
                        </tr>
                        <?php
                      }
                        ?>
                      </table>
                      <?php 
                        }else{
                          ?>

                          <div class="alert alert-danger text-center">
                            Mohon maaf data tidak ditemukan.
                          </div>

                          <?php
                        }
                      }
                        ?>
                  </div>
          </div>
        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>