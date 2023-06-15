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
                <!-- <table border="1"> -->
                  <thead>
                    <tr>
                      <th colspan="2" class="text-center">UNSUR PENILAIAN</th>
                      <th colspan="4" class="text-center">BOBOT/NILAI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th colspan="2">Kehadiran</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>4</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Tidak masuk kerja termasuk sakit</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        0 hari (4) <br>
                        1-2 hari (3) <br>
                        3-5 hari (2) <br>
                        > 5 hari (1)
                      </td>
                    </tr>
                    <tr>
                      <th colspan="2">Kehadiran</th>
                    </tr>
                    <tr>
                      <td class="text-center">B</td>
                      <td>Interupsi/Pulang Awal</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        0-6 kali (4) <br>
                        7-12 kali (3) <br>
                        13-20 kali (2) <br>
                        0-6 kali (1)
                      </td>
                    </tr>
                    <tr>
                      <th colspan="2">Kehadiran</th>
                    </tr>
                    <tr>
                      <td class="text-center">C</td>
                      <td>Keterlambatan</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        0-2 kali (4) <br>
                        3-5 kali (3) <br>
                        6-10 kali (2) <br>
                        > 10 kali (1)
                      </td>
                    </tr>
                    <tr>
                      <th colspan="2">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Kejujuran</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Berperilaku sangat jujur (4) <br>
                        Pernah berperilaku tidak jujur (2) <br>
                        Sering berperilaku tidak jujur (1)
                      </td>
                    </tr>
                    <tr>
                      <th colspan="2">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Respek/Penghargaan kepada orang lain</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>
                        Keterangan : <br>
                        Menghargai (ngajeni) orang lain (4) <br>
                        Mempertimbangkan orang lain (3) <br>
                        Pernah tidak menghargai orang lain (2) <br>
                        Tidak menghargai orang lain (1)
                      </td>
                    </tr>
                    <tr>
                      <th colspan="2">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Respek/Penghargaan kepada orang lain</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
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
                      <th colspan="2">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Terbuka terhadap saran dan kritik</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
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
                      <th colspan="2">Perilaku pergaulan</th>
                    </tr>
                    <tr>
                      <td class="text-center">A</td>
                      <td>Peduli pada orang lainn</td>
                      <td><input type="radio" name="r1_1" class="minimal" value="1"></td>
                      <td><input type="radio" name="r1_2" class="minimal" value="2"></td>
                      <td><input type="radio" name="r1_3" class="minimal" value="3"></td>
                      <td><input type="radio" name="r1_4" class="minimal" value="4"></td>
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
