<?php 
include 'header.php'; 
$id = $_GET['id'];
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                          <label>
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>0 hari</td>
                    </tr>
                    <tr>
                    <td class="text-center">3</td>
                      <td >1-2 hari</td>
                    </tr>
                    <tr>
                      <td class="text-center">2</td>
                      <td>3-5 hari</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td> > 5 hari</td>
                    </tr>


                    <tr>
                      <th colspan="5">Kehadiran</th>
                    </tr>
                    <tr>
                      <td class="text-center">B</td>
                      <td colspan="3">Interupsi/Pulang Awal</td>
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                          <label>
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>0-6 kali</td>
                    </tr>
                    <tr>
                    <td class="text-center">3</td>
                      <td>7-12 kali</td>
                    </tr>
                    <tr>
                      <td class="text-center">2</td>
                      <td>13-20 kali</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>

                      <td>0-6 kali</td>
                    </tr>
                <tr>
                      <th colspan="5">Kehadiran</th>
                    </tr>
                    <tr>
                      <td class="text-center">C</td>
                      <td colspan="3">Keterlambatan</td>
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                          <label>
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>0-2 kali</td>
                    </tr>
                    <tr>
                    <td class="text-center">3</td>
                      <td>3-5 kali</td>
                    </tr>
                    <tr>
                      <td class="text-center">2</td>
                      <td>6-10 kali</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td> > 10 kali</td>
                    </tr>

                    <tr>
                      <th colspan="5">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td colspan="3">Kejujuran</td>
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>Berperilaku sangat jujur</td>
                    </tr>
                      <td class="text-center">2</td>
                      <td>Pernah berperilaku tidak jujur</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td> Sering berperilaku tidak jujur</td>
                    </tr>

                    <tr>
                      <th colspan="5">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td colspan="3">Respek/Penghargaan kepada orang lain</td>
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>Menghargai (ngajeni) orang lain</td>
                    </tr>
                    <tr>
                      <td class="text-center">3</td>
                      <td>Mempertimbangkan orang lain</td>
                    </tr>
                      <td class="text-center">2</td>
                      <td>Pernah tidak menghargai orang lain</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td>Tidak menghargai orang lain</td>
                    </tr>

                    <tr>
                      <th colspan="5">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td colspan="3">Respek/Penghargaan kepada orang lain</td>
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>Keberadaannya sangat diperlukan/diharapkan</td>
                    </tr>
                    <tr>
                      <td class="text-center">3</td>
                      <td>Keberadaannya diperlukan/diharapkan</td>
                    </tr>
                      <td class="text-center">2</td>
                      <td>Keberadaannya tidak berpengaruh</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td>Keberadaannya tidak diharapkan</td>
                    </tr>

                    <tr>
                      <th colspan="5">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td colspan="3">Terbuka terhadap saran dan kritik</td>
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>Orang lain dengan enak dapat menyampaikan kritik dan saran secara spontan</td>
                    </tr>
                    <tr>
                      <td class="text-center">3</td>
                      <td>Orang lain tidak sungkan menyampaikan kritik dan saran ketika diminta</td>
                    </tr>
                      <td class="text-center">2</td>
                      <td>Orang lain enggan menyampaikan kritik  dan saran ketika diminta</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td>Orang lain dengan terpaksa menyampaikan kritik dan saran</td>
                    </tr>

                    <tr>
                      <th colspan="5">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td colspan="3">Peduli pada orang lainn</td>
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
                            <input type="radio" name="r1" class="minimal" checked>
                          </label>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-center">4</td>
                      <td>Sangat peduli pada peristiwa yang dialami orang lain</td>
                    </tr>
                    <tr>
                      <td class="text-center">3</td>
                      <td>Peduli pada peristiwa yang dialami orang lain</td>
                    </tr>
                      <td class="text-center">2</td>
                      <td>Kurang peduli pada peristiwa yang dialami orang lain</td>
                    </tr>
                    <tr>
                      <td class="text-center">1</td>
                      <td>Tidak peduli pada peristiwa yang dialami orang lain</td>
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
