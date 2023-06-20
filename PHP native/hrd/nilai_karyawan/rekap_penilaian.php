<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      REKAP PENILAIAN
      <small>Rekap Penilaian Karyawan</small>
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
            <h3 class="box-title">Rekap Penilaian Karyawan</h3>
          </div>
          <div class="box-body">
            <form method="post" action="" enctype="multipart/form-data">
              
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Bulan</label>
                    <select name="bulan" class="form-control" required="required">
                      <option value="">- Pilih Bulan -</option>
                      <?php
                      $bulan = array(
                          'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                          'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                      );
                      
                      foreach ($bulan as $value) {
                          echo "<option value='$value'>$value</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
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
            <h3 class="box-title">Rekap Penilaian Karyawan</h3>
          </div>
          <div class="box-body">
            <?php
            if(isset($_POST['bulan'])){
              $bulan = $_POST['bulan'];
            ?>
              <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NAMA KARYAWAN</th>
                      <th>JABATAN</th>
                      <th>UNIT KERJA</th>
                      <th>SKOR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      // include '../../koneksi.php';
                      $no=1;
                      $skor=0;
                      $karyawan = "SELECT * FROM karyawan JOIN jabatan ON karyawan.Id_jabatan=jabatan.Id_jabatan JOIN unit_kerja ON unit_kerja.Id_unit_kerja=karyawan.Id_unit_kerja JOIN penilaian ON karyawan.Id_karyawan=penilaian.Id_karyawan WHERE penilaian.Ratarata_nilai!=0 AND penilaian.bulan='$bulan' group by penilaian.Id_karyawan";
                      $result = mysqli_query($koneksi, $karyawan);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $row['Nama']; ?></td>
                      <td><?php echo $row['Nama_jabatan']; ?></td>
                      <td><?php echo $row['Nama_unit_kerja']; ?></td>
                      <td class="text-center"><?php echo round(($row['Ratarata_nilai']/3),2); ?></td>
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
                Silahkan Pilih Bulan Terlebih Dulu.
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
<?php include 'footer_kinerja.php'; ?>
