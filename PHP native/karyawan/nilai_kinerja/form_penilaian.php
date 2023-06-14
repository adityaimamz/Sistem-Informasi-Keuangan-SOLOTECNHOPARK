<?php 
include 'header.php'; 
$id = $_GET['dinilai'];
$bulan = $_GET['bulan'];
$karyawan = mysqli_query($koneksi,"SELECT * FROM karyawan, unit_kerja, jabatan WHERE karyawan.Id_unit_kerja = unit_kerja.Id_unit_kerja AND karyawan.Id_jabatan = jabatan.Id_jabatan AND karyawan.Id_karyawan = '$id'");
$profil = mysqli_fetch_assoc($karyawan);
?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      FORM PENILAIAN
      <small>Form Penilaian Karyawan</small>
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
            <h3 class="box-title">Karyawan yang Dinilai</h3>
          </div>
          <div class="box-body">
            <table class="table table-condensed">
                <tr>
                    <th>No Induk Karyawan</th>
                    <td><?php echo $profil['No_induk_karyawan']; ?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td><?php echo $profil['Nama']; ?></td>
                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td><?php echo $profil['Nama_jabatan']; ?></td>
                </tr>
                <tr>
                    <th>Unit Kerja</th>
                    <td><?php echo $profil['Nama_unit_kerja']; ?></td>
                </tr>
                <tr>
                    <th>Bulan Penilaian</th>
                    <td><?php echo $bulan; ?></td>
                </tr>
            </table>
          </div>
        </div>

        <div class="box box-info">
          <div class="box-header">
            <h3 class="box-title">Form Penilaian</h3>
          </div>
          <div class="box-body">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th colspan="4" class="text-center">UNSUR PENILAIAN</th>
                      <th class="text-center">BOBOT/NILAI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="5">Kehadiran</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td colspan="3">Tidak masuk kerja termasuk sakit</td>
                      <td rowspan="5">
                        <!-- radio -->
                        <div class="form-group">
                          <label>
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                          <label>
                            <input type="radio" name="r1" class="minimal">
                          </label>
                          <label>
                            <input type="radio" name="r1" class="minimal" disabled>
                            Minimal skin radio
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td rowspan="4"></td>
                      <td>Tidak masuk kerja</td>
                      <td>0 hari</td>
                    </tr>
                    <tr>
                      <td>Tidak masuk kerja</td>
                      <td>1-2 hari</td>
                      
                    </tr>
                    <tr>
                      <td>Tidak masuk kerja</td>
                      <td>3-5 hari</td>
                    </tr>
                    <tr>
                      <td>Tidak masuk kerja</td>
                      <td> > 5 hari</td>
                    </tr>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->

          </div>
        </div>

      </section>
    </div>
  </section>

</div>
<?php include 'footer_kinerja.php'; ?>
