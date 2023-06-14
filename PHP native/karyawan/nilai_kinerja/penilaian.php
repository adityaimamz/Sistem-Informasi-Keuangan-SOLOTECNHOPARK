<?php 
include 'header.php'; 
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      PENILAIAN KINERJA
      <small>Penilaian Karyawan</small>
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
            <h3 class="box-title">Penilaian Karyawan</h3>
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
            <h3 class="box-title">Perencanaan Penilaian Karyawan</h3>
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
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $no=1;
                      $id=$_SESSION['id'];
                      var_dump($id);
                      $cek = mysqli_query($koneksi, "SELECT * FROM penilaian WHERE penilaian.karyawan_penilai ='$id'");
                      if (mysqli_num_rows($cek) > 0) {
                          $hasil = mysqli_fetch_assoc($cek);
                          $karyawanDinilai = $hasil['karyawan_dinilai'];
                          var_dump($karyawanDinilai);
                          $data = "SELECT * FROM karyawan, jabatan, unit_kerja WHERE karyawan.Id_jabatan=jabatan.Id_jabatan AND unit_kerja.Id_unit_kerja=karyawan.Id_unit_kerja AND karyawan.Id_karyawan='$karyawanDinilai' ";
                          $result = mysqli_query($koneksi, $data);
                          //memeriksa apakah ada data yang ditemukan
                          if (mysqli_num_rows($result) > 0) { 
                            while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $no++; ?></td>
                          <td><?php echo $row['Nama']; ?></td>
                          <td><?php echo $row['Nama_jabatan']; ?></td>
                          <td><?php echo $row['Nama_unit_kerja']; ?></td>
                          <td class="text-center">
                            <a href="form_penilaian.php?id=<?php echo $row['Id_karyawan'] ?>&bulan=<?php echo $bulan ?>" class="btn btn-warning"><i class="fa fa-edit"> Nilai</i></a>
                          </td>
                        </tr>
                        <?php 
                            }
                          }
                      } else {
                          var_dump('ini ksongS');
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