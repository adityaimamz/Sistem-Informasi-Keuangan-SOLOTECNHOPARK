<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      REKAP PENILAIAN SAYA
      <small>Rekap Penilaian Saya</small>
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
            <h3 class="box-title">Rekap Penilaian Saya</h3>
          </div>
          <div class="box-body">
            <form method="post" action="" enctype="multipart/form-data">
              
              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label>Bulan</label>
                    <select name="bulan" class="form-control" required="required">
                      <option value="semua">- Pilih Semua -</option>
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
            <h3 class="box-title">Rekap Penilaian Saya</h3>
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
                      <th>BULAN</th>
                      <th>SKOR</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no=1;
                      $skor=0;
                      $id=$_SESSION['id'];
                      if($bulan=="semua"){
                        $karyawan = "SELECT * FROM penilaian WHERE Id_karyawan='$id'";
                      }else{
                        $karyawan = "SELECT * FROM penilaian WHERE Id_karyawan='$id' AND bulan='$bulan'";
                      }
                      $result = mysqli_query($koneksi, $karyawan);
                      //memeriksa apakah ada data yang ditemukan
                      if (mysqli_num_rows($result) > 0) { 
                        while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                    <tr>
                      <td class="text-center"><?php echo $no++; ?></td>
                      <td><?php echo $row['Bulan']; ?></td>
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
