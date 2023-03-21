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
            <form method="post" action="penerimaan_laporan_pdf.php" target="_blank">
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

      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>